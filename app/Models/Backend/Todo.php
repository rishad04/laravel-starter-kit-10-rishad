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
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'date',
    ];

    public function getActivitylogOptions(): LogOptions
    {

        $logAttributes = [
            'title',
            'description',
            'user.name',
            'date',
        ];
        return LogOptions::defaults()
            ->useLogName('ToDo')
            ->logOnly($logAttributes)
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName}");
    }

    // Get single row in User table.
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function upload()
    {
        return $this->belongsTo(Upload::class, 'todo_file', 'id');
    }

    public function getTodoStatusAttribute()
    {
        if ($this->status == TodoStatus::PROCESSING) {
            $status = '<span class="bullet-badge bullet-badge-info">' . ___("status." . config('site.status.Todo.' . $this->status)) . '</span>';
        } elseif ($this->status == TodoStatus::COMPLETED) {
            $status = '<span class="bullet-badge bullet-badge-complete">' . ___("status." . config('site.status.Todo.' . $this->status)) . '</span>';
        } else {
            $status = '<span class="bullet-badge bullet-badge-pending">' . ___("status." . config('site.status.Todo.' . $this->status)) . '</span>';
        }

        return $status;
    }
}
