<?php

use App\Enums\StatusEnum;

return [


    'gender' => [
        '0'  => 'others',
        '1'  => 'male',
        '2'  => 'female',
    ],

    'status' => [

        'default' => [
            StatusEnum::INACTIVE->value  => 'inactive',
            StatusEnum::ACTIVE->value  => 'active',
        ],

        'Todo' => [
            '1'  => 'pending',
            '2'  => 'processing',
            '3'  => 'complete',
        ],
    ],




];
