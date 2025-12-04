<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

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
}
