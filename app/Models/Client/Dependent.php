<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Servant;
use App\Models\Client\Kinship;

class Dependent extends Model
{
    protected $fillable = [
        'nome',
        'cpf',
        'numero_rg',
        'orgao_rg',
        'uf_rg',
        'data_emissao_rg',
        'sexo',
        'data_nascimento',
        'nome_mae',
        'nome_pai',
        'cidade_nascimento',
        'uf_nascimento',
        'nome_cartorio',
        'numero_registro_cartorio',
        'numero_livro_cartorio',
        'numero_folha_cartorio',
        'naturalidade',
        'tipo_dependencia',
        'deficiente',
        'invalido',
        'universitario',
    ];

    /***************************************************************************************************************
     * Accessors 
     */
    public function getSexoAttribute($value)
    {
        switch($value) {
            case 'F':
                return 'Feminino';
                break;
            
            case 'M':
                return 'Masculino';
                break;
        }
    }

    public function getDataNascimentoAttribute($value)
    {
        if (is_null($value))
            return;

        return date('d/m/Y', strtotime($value));
    }

    public function getDataEmissaoRgAttribute($value)
    {
        if (is_null($value))
            return;

        return date('d/m/Y', strtotime($value));
    }

    public function getCpfAttribute($value)
    {
        return $this->mask($value, '###.###.###-##');
    }

    /***************************************************************************************************************
     * Mutators
     */
    public function setDataNascimentoAttribute($value)
    {
        if (is_null($value))
            return;

        $this->attributes['data_nascimento'] = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }

    public function setDataEmissaoRgAttribute($value)
    {
        if (is_null($value))
            return;

        $this->attributes['data_emissao_rg'] = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }

    public function setCpfAttribute($value)
    {
        $this->attributes['cpf'] = $this->removeMask($value);
    }

    /***************************************************************************************
     * Relações 1 x N
     */
    public function kinship()
    {
        return $this->belongsTo(Kinship::class);
    }

    /***************************************************************************************
     * Relações N x N
     */
    public function dependent_servant()
    {
        return $this->belongsToMany(Servant::class)->withPivot('kinship_id');
    }


    function mask($value, $mask)
    {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; $i++) {
            if ($mask[$i] == '#') {
                if (isset($value[$k]))
                    $maskared .= $value[$k++];
            } else {
                if (isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }

    public function removeMask($value)
    {
        $value = trim($value);
        $value = str_replace(".", "", $value);
        $value = str_replace(",", "", $value);
        $value = str_replace("-", "", $value);
        $value = str_replace("/", "", $value);
        $value = str_replace("(", "", $value);
        $value = str_replace(")", "", $value);
        $value = str_replace(" ", "", $value);

        return $value;
    }
}
