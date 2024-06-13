<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\Status;
use App\Traits\CommonHelperTrait;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, LogsActivity, CommonHelperTrait;

    protected $fillable = ['name', 'email', 'password',];

    protected $hidden = ['password', 'remember_token', 'two_factor_recovery_codes', 'two_factor_secret',];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'permissions'       => 'array',
        'status'            => Status::class,
        'gender'            => Gender::class
    ];

    protected $appends = ['profile_photo_url',];

    /**
     * Activity Log
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName('User')->logOnly(['name', 'email'])->setDescriptionForEvent(fn (string $eventName) => "{$eventName}");
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function image()
    {
        return $this->belongsTo(Upload::class, 'image_id', 'id');
    }

    public function nid()
    {
        return $this->belongsTo(Upload::class, 'nid', 'id');
    }
}
