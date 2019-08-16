<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Dependent;

class Kinship extends Model
{
    protected $fillable = [
        'codigo',
        'nome'
    ];

    /***************************************************************************************
     * Relações 1 x N
     */
    public function dependents()
    {
        return $this->hasMany(Dependent::class);
    }
}
