<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EconomicGroup extends Model
{
    use HasFactory;

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
}
