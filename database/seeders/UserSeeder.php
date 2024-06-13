<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Enums\Gender;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Upload\UploadInterface;

class UserSeeder extends Seeder
{
        private $uploadRepo;

        public function __construct(UploadInterface $uploadRepo)
        {
                $this->uploadRepo = $uploadRepo;
        }


        public function run()
        {
                $user                        = new User();
                $user->name                  = "Super Admin";
                $user->email                 = "superadmin@bugbuild.com";
                $user->password              = Hash::make('12345678');

                $user->gender                = Gender::MALE;
                $user->remember_token        = Str::random(10);
                $user->phone                 = "01912938002";
                $user->nid_number            = "33422";
                $user->image_id              = $this->uploadRepo->uploadSeederByPath("backend/images/avatar/user.png");
                $user->dob                   = "2022-01-01";
                $user->address               = "Mirpur-10, Dhaka-1216";
                $user->role_id               = 1;
                $user->permissions           = Role::find($user->role_id)->permissions;
                $user->save();

                // Account user
                $user                        = new User();
                $user->name                  = "Admin";
                $user->email                 = "admin@bugbuilg.com";
                $user->gender                = Gender::MALE;
                $user->password              = Hash::make('12345678');
                $user->phone                 = "01478523690";
                $user->image_id              = $this->uploadRepo->uploadSeederByPath("backend/images/avatar/user.png");
                $user->dob                   = "2022-04-20";
                $user->address               = "Mirpur-10, Dhaka-1216";
                $user->role_id               = 2;
                $user->permissions           = Role::find($user->role_id)->permissions;
                $user->save();

                // Account user
                $user                        = new User();
                $user->name                  = "User";
                $user->email                 = "user@gmail.com";
                $user->password              = Hash::make('12345678');
                $user->phone                 = "01478523691";
                $user->nid_number            = "33422";
                $user->image_id              = $this->uploadRepo->uploadSeederByPath("backend/images/avatar/user.png");
                $user->dob                   = "2022-05-08";
                $user->address               = "Mirpur-10, Dhaka-1216";
                $user->role_id               = 2;
                $user->permissions           = Role::find($user->role_id)->permissions;
                $user->save();

                // UserFactory::times(10)->create(); // Factory seed
        }
}
