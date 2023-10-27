<?php

use App\Enums\StatusEnum;
use App\Enums\TodoStatus;
use App\Enums\TodoStatusEnum;

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
            TodoStatusEnum::PENDING->value      => 'pending',
            TodoStatusEnum::PROCESSING->value   => 'processing',
            TodoStatusEnum::COMPLETED->value    => 'complete',
        ],
    ],




];
