<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Unit extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'nome_fantasia',
        'razao_social',
        'cnpj',
        'flag_id',
    ];

    /**
     * Uma Unidade pertence a uma Bandeira
     */
    public function flag()
    {
        return $this->belongsTo(Flag::class);
    }

    /**
     * Uma Unidade possui vários Colaboradores
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nome_fantasia', 'razao_social', 'cnpj', 'flag_id'])
            ->logOnlyDirty()
            ->useLogName('unit');
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Unidade foi {$eventName}";
    }
}
