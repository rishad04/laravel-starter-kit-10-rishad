<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = ['Super Admin', 'Admin', 'User',];

        for ($n = 0; $n < sizeof($roles); $n++) {
            $role              = new Role();
            $role->name        = $roles[$n];
            $role->slug        = str_replace(' ', '-',  strtolower($roles[$n]));
            $role->permissions = $this->generalPermissions();

            if ($role->slug == 'super-admin') {
                $role->permissions = $this->SuperAdminPermissions();
            }

            if ($role->slug == 'admin') {
                $role->permissions = $this->adminPermissions();
            }

            $role->save();
        }
    }

    private function SuperAdminPermissions()
    {
        return [

            'dashboard_read',

            'user_read',
            'user_create',
            'user_update',
            'user_delete',
            'permission_update',

            'profile_read',
            'profile_update',
            'email_update',
            'phone_update',
            'password_update',

            'role_read',
            'role_create',
            'role_update',
            'role_delete',

            'language_read',
            'language_create',
            'language_update',
            'language_delete',
            'language_phrase_update',

            'general_settings_read',
            'general_settings_update',

            'mail_settings_read',
            'mail_settings_update',

            'storage_settings_read',
            'storage_settings_update',

            'recaptcha_settings_read',
            'recaptcha_settings_update',


            'todo_read',
            'todo_create',
            'todo_update',
            'todo_delete',

            'activity_logs_read',
            'activity_logs_view',
            'login_activity_read',

            'database_backup_read',

            'route_read',
            'route_search',


        ];
    }

    private function adminPermissions()
    {
        return [

            'dashboard_read',
        ];
    }

    private function generalPermissions(): array
    {
        return [

            'profile_read',
            'profile_update',
            'self_user_account_delete',

            'email_update',
            'phone_update',
            'password_update',
        ];
    }
}