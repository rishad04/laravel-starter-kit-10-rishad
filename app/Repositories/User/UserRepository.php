<?php

namespace App\Repositories\User;

use App\Enums\ImageSize;
use App\Models\User;
use App\Models\Backend\Hub;
use App\Models\Backend\Department;
use App\Models\Backend\Designation;
use App\Models\Backend\Upload;
use App\Traits\ReturnFormatTrait;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserInterface;
use App\Enums\UserType;
use App\Models\Backend\Role;
use App\Repositories\Upload\UploadInterface;

class UserRepository implements UserInterface
{
    use ReturnFormatTrait;
    protected $model, $upload;

    public function __construct(User $model, UploadInterface $upload)
    {
        $this->model    = $model;
        $this->upload   = $upload;
    }

    // get all rows in User model with Upload & Hub model row same as foreign key.
    public function all()
    {
        return $this->model::orderByDesc('id')->paginate(10);
    }

    public function filter($request)
    {
        return $this->model::where(function ($query) use ($request) {
            if ($request->name) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }
            if ($request->email) {
                $query->where('email', 'like', '%' . $request->email . '%');
            }
            if ($request->phone) :
                $query->where('mobile', 'like', '%' . $request->phone . '%');
            endif;
        })->orderByDesc('id')->paginate(10);
    }

    // get all rows in Hub model
    // public function hubs()
    // {
    //     return Hub::orderBy('name')->get();
    // }

    // // get all rows in Department model
    // public function departments()
    // {
    //     return Department::active()->orderBy('title')->get();
    // }

    // get all rows in Designation model
    public function designations()
    {
        return Designation::active()->orderBy('title')->get();
    }

    // get single row in User model with Upload model row same as foreign key.
    public function get($id)
    {
        return $this->model::with('upload', 'role')->find($id);
    }

    // All request data store in User tabel.
    public function store($request)
    {

        try {
            $role                   = $this->model::where('id', $request->role_id)->first();
            $user                   = new User();
            $user->name             = $request->name;
            $user->email            = $request->email;
            $user->password         = Hash::make($request->password);
            $user->mobile           = $request->mobile;
            $user->nid_number       = $request->nid_number;
            $user->designation_id   = $request->designation_id;
            $user->department_id    = $request->department_id;

            if ($request->filled('hub_id')) :
                $user->hub_id           = $request->hub_id ? $request->hub_id : null;
            endif;

            $user->image_id         = $this->upload->uploadImage($request->image, 'users/', [ImageSize::IMAGE_80x80, ImageSize::IMAGE_370x240], '');

            $user->joining_date     = $request->joining_date;
            $user->address          = $request->address;
            $user->role_id          = $request->role_id;
            $user->salary           = $request->salary !== "" ? $request->salary : 0;
            if ($request->hub_id) {
                $user->permissions     = $this->hubPermissions();
            } else {
                if ($role->permissions !== null) {
                    $user->permissions  = $role->permissions;
                }
            }
            $user->status           = $request->status;
            $user->save();

            return $this->responseWithSuccess(__('alert.successfully_added'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(__('alert.something_went_wrong'), []);
        }
    }

    // All request data update in User tabel.
    public function update($request)
    {
        try {
            $role = $this->model::where('id', $request->role_id)->first();

            $user                       = $this->model::find($request->id);
            $user->name                 = $request->name;
            $user->email                = $request->email;
            $user->mobile               = $request->mobile;
            $user->nid_number           = $request->nid_number;

            if ($request->id != 1) {
                $user->hub_id           = $request->hub_id ? $request->hub_id : null;
                $user->designation_id   = $request->designation_id;
                $user->department_id    = $request->department_id;
                $user->status           = $request->status;
            }

            $user->joining_date         = $request->joining_date;
            $user->address              = $request->address;

            if ($request->password != null) {
                $user->password = Hash::make($request->password);
            }

            $user->image_id             = $this->upload->uploadImage($request->image, 'users/', [ImageSize::IMAGE_80x80, ImageSize::IMAGE_370x240], $user->image_id);

            $user->role_id              = $request->role_id;
            $user->salary               = $request->salary !== "" ? $request->salary : 0;
            if ($request->hub_id) {
                $user->permissions     = $this->hubPermissions();
            } elseif ($role) {
                if ($role->permissions !== null) {
                    $user->permissions  = $role->permissions;
                }
            }
            $user->save();

            return $this->responseWithSuccess(__('alert.successfully_updated'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(__('alert.something_went_wrong'), []);
        }
    }

    private function hubPermissions()
    {
        return [
            'dashboard_read',
            'hub_payment_read',
            'parcel_read',
            'cash_received_from_delivery_man_read',
            'cash_received_from_delivery_man_create',
            'cash_received_from_delivery_man_update',
            'cash_received_from_delivery_man_delete',
            'hub_payment_request_read',
            'hub_payment_request_create',
            'hub_payment_request_delete',
        ];
    }

    // Delete single row in User Model with Delete single row in Upload model and delete image in public/upload/user folder..
    public function delete($id)
    {
        try {
            $item  = $this->model::findOrFail($id);

            $this->upload->deleteImage($item->image_id, 'delete');

            $item->delete();

            return $this->responseWithSuccess(__('alert.successfully_deleted'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(__('alert.something_went_wrong'), []);
        }
    }

    // Request image Store in Upload Model and image copy file attach in public/upload/user folder.
    public function file($image_id = '', $image)
    {
        try {
            $image_name = '';
            if (!blank($image)) {
                $destinationPath       = public_path('uploads/users');
                $profileImage          = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $image_name            = 'uploads/users/' . $profileImage;
            }
            if (blank($image_id)) {
                $upload           = new Upload();
            } else {
                $upload           = Upload::find($image_id);
                if (file_exists(public_path($upload->original))) {
                    unlink(public_path($upload->original));
                }
            }
            $upload->original     = $image_name;
            $upload->save();
            return $upload->id;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function permissionUpdate($id, $request)
    {

        try {
            $user = $this->model::where('id', $id)->first();
            if ($request->permissions !== null) {
                $user->permissions = $request->permissions;
            } else {
                $user->permissions = [];
            }
            $user->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
