<?php

use App\Enums\GenderEnum;
use App\Enums\StatusEnum;

return [


    'gender' => [
        GenderEnum::OTHERS->value   => 'others',
        GenderEnum::MALE->value     => 'male',
        GenderEnum::FEMALE->value   => 'female',
    ],

    'status' => [

        'default' => [
            StatusEnum::INACTIVE->value  => 'inactive',
            StatusEnum::ACTIVE->value    => 'active',
        ],

        'Todo' => [
            StatusEnum::PENDING->value      => 'pending',
            StatusEnum::PROCESSING->value   => 'processing',
            StatusEnum::COMPLETED->value    => 'complete',
        ],
    ],

    'translations' => [
        'alert'         => 'Alert',
        'label'         => 'Label',
        'language'      => 'Language',
        'menus'         => 'Menus',
        'permissions'   => 'Permissions',
        'placeholder'   => 'Placeholder',
        'recaptcha'     => 'Recaptcha',
        'role'          => 'Role',
        'status'        => 'Status',
        'user'          => 'User',
        'website_setup' => 'Website Setup',
    ],




];
