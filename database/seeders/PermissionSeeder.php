<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            //for staff
            'users'             => ['read' => 'user_read', 'create' => 'user_create', 'update' => 'user_update', 'delete' => 'user_delete'],
            'roles'             => ['read' =>  'role_read', 'create' => 'role_create', 'update' =>  'role_update', 'delete' =>  'role_delete'],
            'language'          => ['read' =>  'language_read', 'create' => 'language_create', 'update' =>  'language_update','update terms' =>  'language_update_terms', 'delete' =>  'language_delete'],
            'general settings'  => ['read' =>  'general_settings_read', 'update' => 'general_settings_update'],
            'storage settings'  => ['read' =>  'storage_settings_read', 'update' => 'storage_settings_update'],
            'recaptcha settings'=> ['read' =>  'recaptcha_settings_read', 'update' => 'recaptcha_settings_update'],
            'email settings'    => ['read' =>  'email_settings_read', 'update' => 'email_settings_update'],
        ];

        foreach($attributes as $key => $attribute){
        	$permission               = new Permission();
        	$permission->attribute    = $key;
            $permission->keywords     = $attribute;
        	$permission->save();
        }
    }
}
