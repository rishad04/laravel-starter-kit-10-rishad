<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'              => 'Jarret Waelchi',
            'phone'             => '01811000000',
            'email'             => 'superadmin@bugbuild.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('123456'),
            'remember_token'    => Str::random(10),
            'role_id'           => 1,
            'date_of_birth'     => '2022-09-07',
            'upload_id'          => 1,
            'designation_id'    => rand(1, 5),
            'permissions' => [
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
                'email_settings_update'
            ],
        ]);

        User::create([
            'name'              => 'Faye Clether',
            'phone'              => '01811000001',
            'email'             => 'admin@bugbuild.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('123456'),
            'remember_token'    => Str::random(10),
            'role_id'           => 2,
            'date_of_birth'     => '2022-09-07',
            'upload_id'          => 2,
            'designation_id'    => rand(1, 5),
            'permissions' => [
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
            ],
        ]);

        User::create([
            'name'              => 'Anna Littlical',
            'phone'              => '01811000002',
            'email'             => 'manager@bugbuild.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('123456'),
            'remember_token'    => Str::random(10),
            'role_id'           => 3,
            'date_of_birth'     => '2022-09-07',
            'upload_id'          => 3,
            'designation_id'    => rand(1, 5),
            'permissions' => [
                'user_read',
                'user_create',
                'role_read',
                'language_read',
                'language_create',
                'general_settings_read',
                'storage_settings_read',
                'recaptcha_settings_read',
                'email_settings_read',
            ],
        ]);

        for ($i = 0; $i <= 30; $i++) {

            User::create([
                'name'              =>  'Al Annon ' . $i,
                'phone'              =>  '134578978456' . $i,
                'email'             => 'user' . $i . '@bugbuild.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('123456'),
                'remember_token'    => Str::random(10),
                'role_id'           => 4,
                'date_of_birth'     => '2022-09-07',
                'upload_id'          => 4,
                'designation_id'    => rand(1, 5),
                'permissions' => [
                    'user_read',
                    'role_read',
                    'language_read',
                ],
            ]);
        }
    }
}
