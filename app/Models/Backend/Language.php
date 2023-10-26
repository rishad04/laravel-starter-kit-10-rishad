<?php

namespace App\Models\Backend;

use App\Enums\Status;
use App\Traits\CommonHelperTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Language extends Model
{
    use HasFactory, LogsActivity, CommonHelperTrait;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Language')
            ->logOnly(['name', 'code', 'icon_class', 'text_direction'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName}");
    }

    public function langConfig()
    {
        return $this->belongsTo(LanguageConfig::class, 'id', 'language_id');
    }
}
