<?php

namespace App\Models;

use App\Enums\GENDER;
use App\Enums\GenderEnum;
use App\Enums\StatusEnum;
use App\Traits\CommonHelperTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, LogsActivity, CommonHelperTrait;

    protected $fillable = ['name', 'email', 'password',];

    protected $hidden = ['password', 'remember_token', 'two_factor_recovery_codes', 'two_factor_secret',];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'permissions' => 'array',
        'status' => StatusEnum::class,
        'gender' => GenderEnum::class
    ];

    protected $appends = ['profile_photo_url',];

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id', 'id');
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

    // public function getImageAttribute()
    // {
    //     if (!empty($this->upload->original['original']) && file_exists(public_path($this->upload->original['original']))) {
    //         return static_asset($this->upload->original['original']);
    //     }
    //     return static_asset('backend/images/avatar/user-profile.png');
    // }

    /**
     * Activity Log
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('User')
            ->logOnly(['name', 'email'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName}");
    }
}
