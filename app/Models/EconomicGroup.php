<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class EconomicGroup extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
    ];

    /**
     * Cada Grupo Econômico possui várias Bandeiras
     */
    public function flags()
    {
        return $this->hasMany(Flag::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name'])
            ->logOnlyDirty()
            ->useLogName('economic_group');
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Grupo Econômico foi {$eventName}";
    }
}
