<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * Atributos que podem ser inseridos
     */
    protected $fillable = [
        'cep',
        'numero',
        'logradouro',
        'bairro',
        'cidade',
        'estado'
    ];

    public function company()
    {
        return $this->hasOne(Company::class);
    }
}
