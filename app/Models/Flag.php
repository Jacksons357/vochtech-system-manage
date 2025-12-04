<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'economic_group_id'
    ];

    /**
     * Uma Bandeira pertence a um Grupo Econômico
     */
    public function economicGroup()
    {
        return $this->belongsTo(EconomicGroup::class);
    }

    /**
     * Uma Bandeira possui várias Unidades
     */
    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
