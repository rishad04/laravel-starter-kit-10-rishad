<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user                        = new User();
        $user->name                  = "Percel Fly";
        $user->email                 = "superadmin@bugbuilg.com";
        $user->password              = Hash::make('123456');
        $user->remember_token        = Str::random(10);
        $user->phone                 = "01912938002";
        $user->nid_number            = "33422";
        $user->image_id              = DB::table('uploads')->insertGetId(['original' => 'backend/images/avatar/user-profile.png']);
        $user->dob                   = "2022-01-01";
        $user->address               = "Mirpur-10, Dhaka-1216";
        $user->role_id               = 1;
        $user->permissions           = $this->supperAdminPermissions();
        $user->save();

        // Account user
        $user                        = new User();
        $user->name                  = "Admin";
        $user->email                 = "admin@bugbuilg.com";
        $user->password              = Hash::make('123456');
        $user->phone                 = "01478523690";
        $user->image_id              = DB::table('uploads')->insertGetId(['original' => 'backend/images/avatar/user-profile.png']);
        $user->dob                   = "2022-04-20";
        $user->address               = "Mirpur-10, Dhaka-1216";
        $user->role_id               = 2;
        $user->permissions           = $this->AdminPermissions();
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

        $user->permissions           = $this->AdminPermissions();
        $user->save();
    }

    private function supperAdminPermissions()
    {
        return [

            'user_read',
            'user_create',
            'user_update',
            'user_delete',
            'role_read',
            'role_create',
            'role_update',
            'role_delete',
            'language_read',
            'language_create',
            'language_update',
            'language_update_terms',
            'language_delete',
            'general_settings_read',
            'general_settings_update',
            'storage_settings_read',
            'storage_settings_update',
            'recaptcha_settings_read',
            'recaptcha_settings_update',
            'email_settings_read',
            'email_settings_update',
            'language_settings_read',
            'language_settings_update',
            'dashboard_read'

        ];
    }


    private function adminPermissions()
    {
        return [       
            'user_read',
            'user_create',
            'user_update',
            'user_delete',
            'role_read',
            'role_create',
            'role_update',
            'role_delete',
            'language_read',
            'language_create',
            'language_update_terms',
            'general_settings_read',
            'general_settings_update',
            'storage_settings_read',
            'storage_settings_read',
            'recaptcha_settings_update',
            'email_settings_read',
         ];
    }
}
