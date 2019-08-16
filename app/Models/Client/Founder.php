<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Servant;
use App\Models\Client\Nationality;

class Founder extends Model
{

    protected $fillable = [
        'nome',
        'cpf',
        'sexo',
        'uf',
        'data_nascimento',
        'data_falecimento',
        'nationality_id',
    ];

    /***************************************************************************************
     * Relações 1 x N
     */
    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    /***************************************************************************************
     * Relações N x N
     */
    public function founder_servant()
    {
        return $this->belongsToMany(Servant::class);
    }

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

    public function getCpfAttribute($value)
    {
        return $this->mask($value, '###.###.###-##');
    }

    public function getDataNascimentoAttribute($value)
    {
        if (is_null($value))
            return;

        return date('d/m/Y', strtotime($value));
    }

    public function getDataFalecimentoAttribute($value)
    {
        if (is_null($value))
            return;

        return date('d/m/Y', strtotime($value));
    }

    /****************************************************************************************************************
     * Mutators
     */
    public function setCpfAttribute($value)
    {
        $this->attributes['cpf'] = $this->removeMask($value);
    }

    public function setDataNascimentoAttribute($value)
    {
        if (is_null($value))
            return;

        $this->attributes['data_nascimento'] = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }

    public function setDataFalecimentoAttribute($value)
    {
        if (is_null($value))
            return;

        $this->attributes['data_falecimento'] = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }

     /****************************************************************************************
     * Add Mask
     */
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
    /****************************************************************************************
     * Remove Mask
     */
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
