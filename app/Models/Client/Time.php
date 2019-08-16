<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Servant;

class Time extends Model
{
    protected $fillable = [
        'natureza_juridica',
        'cnpj',
        'razao_social',
    ];

    public function servant_time()
    {
        return $this->belongsToMany(Servant::class)->withPivot('data_inicio', 'data_fim', 'tipo_vinculo', 'tipo_regime_trabalho', 'caracteristicas_especiais');
    }

    /***************************************************************************************************************
     * Accessors 
     */


}
