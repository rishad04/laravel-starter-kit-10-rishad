<?php

namespace App\Models;

use App\Enums\StatusEnum;
use App\Traits\CommonHelperTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RouteList extends Model
{
    use HasFactory, CommonHelperTrait;

    protected $casts = [
        'status' => StatusEnum::class,
    ];
}
