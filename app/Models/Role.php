<?php

namespace App\Models;

use App\Enums\StatusEnum;
use App\Traits\CommonHelperTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, CommonHelperTrait;

    protected $casts = [
        'permissions' => 'array',
        'status' => StatusEnum::class,
    ];
}
