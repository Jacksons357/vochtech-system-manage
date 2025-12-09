<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Employee extends Model
{
    use HasFactory, LogsActivity;

    protected static $logAttributes = ['name', 'email', 'cpf', 'unit_id'];
    protected static $logOnlyDirty = true;
    protected static $logName = 'employee';

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'unit_id',
    ];

    /**
     * Um Colaborador pertence a uma Unidade
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email', 'cpf', 'unit_id'])
            ->logOnlyDirty()
            ->useLogName('employee');
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Colaborador foi {$eventName}";
    }
}
