<?php

namespace App\Repositories\User;

use App\Enums\ImageSize;
use App\Enums\Status;
use App\Mail\PasswordResetToken;
use App\Mail\Signup;
use App\Mail\TokenResend;
use App\Models\Role;
use App\Models\User;
use App\Traits\ReturnFormatTrait;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserInterface;
use App\Repositories\Upload\UploadInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
            $user->dob              =  Carbon::parse($request->dob)->format('Y-m-d');
            $user->about            =  $request->about;

            $user->role_id          = $request->role_id;
            $user->permissions      = Role::find($user->role_id)->permissions;
            $user->status           = $request->status;
            $user->save();

            return $this->responseWithSuccess(___('alert.successfully_added'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong'), []);
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

            $user->dob              =  Carbon::parse($request->dob)->format('Y-m-d');
            $user->gender           =  $request->gender;

            $user->nid_number       = $request->nid_number;
            $user->nid              = $this->upload->uploadImage($request->image, 'users', [ImageSize::IMAGE_80x80, ImageSize::IMAGE_370x240], $user->nid);
            $user->image_id         = $this->upload->uploadImage($request->image, 'users', [ImageSize::IMAGE_80x80, ImageSize::IMAGE_370x240], $user->image_id);

            $user->address          = $request->address;
            $user->about            =  $request->about;

            $user->role_id          = $request->role_id;
            $user->permissions      = Role::find($user->role_id)->permissions;
            $user->status           = $request->status;
            $user->save();

            return $this->responseWithSuccess(___('alert.successfully_updated'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong'), []);
        }
    }


    public function delete($id)
    {
        try {
            $item  = $this->model::findOrFail($id);

            $this->upload->deleteImage($item->image_id, 'delete');

            $item->delete();

            return $this->responseWithSuccess(___('alert.successfully_deleted'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong'), []);
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
            $user->dob              =  Carbon::parse($request->dob)->format('Y-m-d');
            $user->gender           = $request->gender;
            $user->image_id         = $this->upload->uploadImage($request->image, 'users', [ImageSize::IMAGE_80x80, ImageSize::IMAGE_370x240], $user->image_id);
            $user->address          = $request->address;
            $user->about            = $request->about;
            $user->save();
            return $this->responseWithSuccess(___('alert.successfully_updated'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong'), []);
        }
    }

    public function passwordUpdate($request)
    {
        try {
            $user   = $this->model::find(auth()->user()->id);
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                return $this->responseWithSuccess(___('alert.password_updated'), []);
            }
            return $this->responseWithError(___('alert.old_password_not_match'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong'), []);
        }
    }

    public function passwordReset($request)
    {
        try {
            $user   = $this->model::find($request->user_id);

            if ($user != null && session()->has('token') && session('token') == $request->token) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                return $this->responseWithSuccess(___('alert.password_updated'), []);
            }

            return $this->responseWithError(___('alert.something_went_wrong'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong'), []);
        }
    }

    public function signup($request)
    {
        try {
            DB::beginTransaction();

            $user                   = $this->model;
            $user->name             = $request->name;
            $user->email            = $request->email;
            $user->password         = Hash::make($request->password);
            $user->phone            = $request->phone;
            $user->dob              =  Carbon::parse($request->dob)->format('Y-m-d');
            $user->gender           =  $request->gender;

            $user->role_id          = 2;
            $user->permissions      = Role::find($user->role_id)->permissions;

            $user->status           = Status::INACTIVE;
            $user->token            = rand(100000, 999999);;

            $user->save();

            session(['user_id' => $user->id, 'email' => $user->email, 'password' => $request->password,]);

            Mail::to($user->email)->send(new Signup($user));

            DB::commit();
            return $this->responseWithSuccess(___('alert.registration_successful'), []);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseWithError(___('alert.something_went_wrong'), []);
        }
    }

    public function verifyToken($request)
    {
        try {
            $user     = User::where('id', $request->user_id)->where('token', $request->token)->first();
            if ($user == null) {
                return $this->responseWithError(___('alert.something_went_wrong'), []);
            }

            $user->email_verified_at    = now();
            $user->token                = null;
            $user->status               = StatusEnum::ACTIVE;
            $user->save();

            return $this->responseWithSuccess(___('alert.verified'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong'), []);
        }
    }

    public function resendToken($request)
    {
        try {
            $user           = $this->get($request->user_id);
            $user->token    = random_int(10000, 99999);
            $user->save();

            Mail::to($user->email)->send(new TokenResend($user));

            return $this->responseWithSuccess(___('alert.otp_mail_send'), []);
        } catch (\Exception $e) {
            return $this->responseWithError(___('alert.something_went_wrong'), []);
        }
    }

    public function passwordResetToken($request)
    {
        try {
            $user           = $this->model::where('email', $request->email)->first();
            $user->token    = random_int(10000, 99999);
            $user->save();

            session(['user_id' => $user->id, 'email' => $user->email]);

            Mail::to($user->email)->send(new PasswordResetToken($user));

            return $this->responseWithSuccess(___('alert.otp_mail_send'), []);
        } catch (\Exception $e) {
            return $this->responseWithError(___('alert.something_went_wrong'), []);
        }
    }
}
