<?php

namespace App\Models\backend;

use App\Models\User;
use App\Models\Upload;

use App\Enums\TodoStatus;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'date',];

    protected $casts = [
        'status' => TodoStatus::class,
    ];

    public function getActivitylogOptions(): LogOptions
    {
        $logAttributes = ['title', 'description', 'user.name', 'date',];

        return LogOptions::defaults()->useLogName('ToDo')->logOnly($logAttributes)->setDescriptionForEvent(fn (string $eventName) => "{$eventName}");
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function upload()
    {
        return $this->belongsTo(Upload::class, 'file_id', 'id');
    }

    public function getTodoStatusAttribute()
    {
        if ($this->status == TodoStatus::PROCESSING) {
            $status = '<span class="bullet-badge bullet-badge-info">' . ___("label." . $this->status->value) . '</span>';
        } elseif ($this->status == TodoStatus::COMPLETED) {
            $status = '<span class="bullet-badge bullet-badge-complete">' . ___("label." . $this->status->value) . '</span>';
        } else {
            $status = '<span class="bullet-badge bullet-badge-pending">' . ___("label." . $this->status->value) . '</span>';
        }

        return $status;
    }
}
