<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Flag extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'economic_group_id'
    ];

    /**
     * Uma Bandeira pertence a um Grupo Econômico
     */
    public function economicGroup()
    {
        return $this->belongsTo(EconomicGroup::class, 'economic_group_id');
    }

    /**
     * Uma Bandeira possui várias Unidades
     */
    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'economic_group_id'])
            ->logOnlyDirty()
            ->useLogName('flag');
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Bandeira foi {$eventName}";
    }
}
