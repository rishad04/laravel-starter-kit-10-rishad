<?php

namespace Database\Seeders;

use App\Enums\GENDER;
use App\Models\Role;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
        public function run()
        {
                $user                        = new User();
                $user->name                  = "Super Admin";
                $user->email                 = "superadmin@bugbuilg.com";
                $user->password              = Hash::make('123456');
                $user->designations          = 'Super Admin';
                $user->gender                = GENDER::MALE;
                $user->remember_token        = Str::random(10);
                $user->phone                 = "01912938002";
                $user->nid_number            = "33422";
                $user->image_id              = DB::table('uploads')->insertGetId(['original' => 'backend/images/avatar/user-profile.png']);
                $user->dob                   = "2022-01-01";
                $user->address               = "Mirpur-10, Dhaka-1216";
                $user->role_id               = 1;
                $user->permissions           = Role::find($user->role_id)->permissions;
                $user->save();

                // Account user
                $user                        = new User();
                $user->name                  = "Admin";
                $user->email                 = "admin@bugbuilg.com";
                $user->designations          = 'Admin';
                $user->gender                = Gender::MALE;
                $user->password              = Hash::make('123456');
                $user->phone                 = "01478523690";
                $user->image_id              = DB::table('uploads')->insertGetId(['original' => 'backend/images/avatar/user-profile.png']);
                $user->dob                   = "2022-04-20";
                $user->address               = "Mirpur-10, Dhaka-1216";
                $user->role_id               = 2;
                $user->permissions           = Role::find($user->role_id)->permissions;
                $user->save();

                // Account user
                $user                        = new User();
                $user->name                  = "User";
                $user->email                 = "user@gmail.com";
                $user->password              = Hash::make('123456');
                $user->phone                 = "01478523691";
                $user->nid_number            = "33422";
                $user->image_id              = DB::table('uploads')->insertGetId(['original' => 'backend/images/avatar/user-profile.png']);
                $user->dob                   = "2022-05-08";
                $user->address               = "Mirpur-10, Dhaka-1216";
                $user->role_id               = 2;
                $user->permissions           = Role::find($user->role_id)->permissions;
                $user->save();

                UserFactory::times(10)->create(); // Factory seed
        }
}
