<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Servant;

class Race extends Model
{
    protected $fillable = [
        'codigo',
        'nome'
    ];

    /***************************************************************************************
     * Relações 1 x N
     */
    public function servants()
    {
        return $this->hasMany(Servant::class);
    }
}
