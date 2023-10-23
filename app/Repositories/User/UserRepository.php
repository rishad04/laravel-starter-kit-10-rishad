<?php

namespace App\Repositories\User;

use App\Enums\ImageSize;
use App\Models\User;
use App\Traits\ReturnFormatTrait;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserInterface;
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

    public function all(int $paginate = null, bool $status = null)
    {
        $query = $this->model::query();

        if ($status !== null) {
            $query->where('status', $status);
        }

        $query->latest('updated_at');

        $query->with('image');

        if ($paginate !== null) {
            return  $query->paginate($paginate);
        }

        return $query->get();
    }

    public function get($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($request)
    {
        try {
            $user                   = new User();
            $user->name             = $request->name;
            $user->email            = $request->email;
            $user->password         = Hash::make($request->password);
            $user->phone            = $request->phone;
            $user->nid_number       = $request->nid_number;
            $user->nid              = $this->upload->uploadImage($request->image, 'users', [ImageSize::IMAGE_80x80, ImageSize::IMAGE_370x240]);
            $user->image_id         = $this->upload->uploadImage($request->image, 'users', [ImageSize::IMAGE_80x80, ImageSize::IMAGE_370x240]);
            $user->address          = $request->address;

            $user->gender           =  $request->gender;
            $user->designations     =  $request->designations;
            $user->dob              =  $request->dob;
            $user->about            =  $request->about;

            $user->role_id          = $request->role_id;
            $user->permissions      = [];
            $user->status           = $request->status;
            $user->save();

            return $this->responseWithSuccess(__('alert.successfully_added'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(__('alert.something_went_wrong'), []);
        }
    }

    public function update($request)
    {
        try {
            $user                   = $this->model::find($request->id);
            $user->name             = $request->name;
            $user->email            = $request->email;
            $user->password         = Hash::make($request->password);
            $user->phone            = $request->phone;
            $user->nid_number       = $request->nid_number;

            $user->nid              = $this->upload->uploadImage($request->image, 'users', [ImageSize::IMAGE_80x80, ImageSize::IMAGE_370x240], $user->nid);

            $user->image_id         = $this->upload->uploadImage($request->image, 'users', [ImageSize::IMAGE_80x80, ImageSize::IMAGE_370x240], $user->image_id);
            $user->address          = $request->address;

            $user->gender           =  $request->gender;
            $user->designations     =  $request->designations;
            $user->dob              =  $request->dob;
            $user->about            =  $request->about;

            $user->role_id          = $request->role_id;
            $user->permissions      = [];
            $user->status           = $request->status;
            $user->save();

            return $this->responseWithSuccess(__('alert.successfully_updated'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(__('alert.something_went_wrong'), []);
        }
    }


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

    public function profileUpdate($request)
    {
        try {
            $user                   = $this->model::find(auth()->user()->id);
            $user->name             = $request->name;
            $user->dob              = $request->dob;
            $user->gender           = $request->gender;
            $user->image_id         = $this->upload->uploadImage($request->image, 'users', [ImageSize::IMAGE_80x80, ImageSize::IMAGE_370x240], $user->image_id);
            $user->address          = $request->address;
            $user->about            = $request->about;
            $user->save();
            return $this->responseWithSuccess(__('alert.successfully_updated'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(__('alert.something_went_wrong'), []);
        }
    }

    public function passwordUpdate($request)
    {
        try {
            $user   = $this->model::find(auth()->user()->id);
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                return $this->responseWithSuccess(__('alert.password_updated'), []);
            }
            return $this->responseWithError(__('alert.old_password_not_match'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(__('alert.something_went_wrong'), []);
        }
    }
}
