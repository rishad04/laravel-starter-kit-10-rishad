<?php

namespace App\Models\backend;

use App\Models\User;
use App\Models\Upload;

use App\Enums\TodoStatus;
use App\Traits\CommonHelperTrait;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory,CommonHelperTrait;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'date',
    ];

    // public function getActivitylogOptions(): LogOptions
    // {

    //     $logAttributes = [
    //         'title',
    //         'description',
    //         'user.name',
    //         'date',
    //     ];
    //     return LogOptions::defaults()
    //         ->useLogName('ToDo')
    //         ->logOnly($logAttributes)
    //         ->setDescriptionForEvent(fn (string $eventName) => "{$eventName}");
    // }

    // Get single row in User table.
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function upload(){
        return $this->belongsTo(Upload::class,'todo_file','id');
    }




}
