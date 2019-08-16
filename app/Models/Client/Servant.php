<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Nationality;
use App\Models\Client\MartialStatus;
use App\Models\Client\Instruction;
use App\Models\Client\PhysicalDisability;
use App\Models\Client\Race;
use App\Models\Client\PublicPlace;
use App\Models\Client\Document;
use App\Models\Client\Founder;
use App\Models\Client\Dependent;
use App\Models\Client\Time;
use App\Models\Client\Appointment;
use Carbon\Carbon;

class Servant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'registro',
        'matricula',
        'nome',
        'sexo',
        'cpf',
        'nome_mae',
        'cpf_mae',
        'nome_pai',
        'cpf_pai',
        'data_nascimento',
        'uf_nascimento',
        'cidade_nascimento',
        'registro_nascimento',
        'livro',
        'folha',
        'ano_chegada',
        'necessidades_especiais',
        'alergia_medicamentos',
        'medicamentos',
        'altura',
        'peso',
        'tipo_sanguineo',
        'doador',
        'cor_olhos',
        'cor_cabelo',
        'numero_rg',
        'orgao_rg',
        'uf_rg',
        'data_emissao_rg',
        'numero_titulo',
        'zona_titulo',
        'secao_titulo',
        'uf_titulo',
        'numero_ctps',
        'serie_ctps',
        'uf_ctps',
        'data_emissao_ctps',
        'numero_documento_profissional',
        'tipo_documento_profissional',
        'uf_documento_profissional',
        'pis',
        'reservista',
        'numero_cnh',
        'uf_cnh',
        'data_expedicao_cnh',
        'data_validade_cnh',
        'categoria_cnh',
        'cep',
        'logradouro',
        'bairro',
        'numero',
        'uf_endereco',
        'cidade',
        'cidade_codigo_ibge',
        'complemento',
        'telefone_fixo',
        'fone_celular',
        'email',
        'observacoes',
        'cargo',
        'data_admissao',
        'orgao',
        'departamento',
        'data_concessao_aposentadoria',
        'numero_concessao_aposentadoria',
        'data_concessao_pensao',
        'tipo_beneficio',
        'nationality_id',
        'martial_status_id',
        'instruction_id',
        'physical_disability_id',
        'race_id',
        'public_place_id',
        'foto',
        'documento_entregue_rg',
        'documento_entregue_cpf',
        'documento_entregue_certidao_casamento',
        'documento_entregue_ctps',
        'documento_entregue_foto',
        'documento_entregue_certidao_nascimento',
        'documento_entregue_ctc_inss',
        'documento_entregue_ctc_regime_proprio',
        'tipo_declarante',
        'numero_ctc_inss',
        'path_ctc_inss',
        'file_ctc_inss',
        'numero_ctc_regime_proprio',
        'path_ctc_regime_proprio',
        'file_ctc_regime_proprio',
        'observacoes_documentos',
        'parcial',
        'finalizado'
    ];

    /***************************************************************************************************************
     * Accessors 
     */
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

    public function getDataEmissaoRgAttribute($value)
    {
        if (is_null($value))
            return;

        return date('d/m/Y', strtotime($value));
    }

    public function getDataExpedicaoCnhAttribute($value)
    {
        if (is_null($value))
            return;

        return date('d/m/Y', strtotime($value));
    }

    public function getDataValidadeCnhAttribute($value)
    {
        if (is_null($value))
            return;

        return date('d/m/Y', strtotime($value));
    }

    public function getDataEmissaoCtpsAttribute($value)
    {
        if (is_null($value))
            return;

        return date('d/m/Y', strtotime($value));
    }

    public function getDataAdmissaoAttribute($value)
    {
        if (is_null($value))
            return;

        return date('d/m/Y', strtotime($value));
    }

    public function getDataConcessaoAposentadoriaAttribute($value)
    {
        if (is_null($value))
            return;

        return date('d/m/Y', strtotime($value));
    }

    public function getDataConcessaoPensaoAttribute($value)
    {
        if (is_null($value))
            return;

        return date('d/m/Y', strtotime($value));
    }

    /**
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

    public function setDataExpedicaoCnhAttribute($value)
    {
        if (is_null($value))
            return;

        $this->attributes['data_expedicao_cnh'] = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }

    public function setDataValidadeCnhAttribute($value)
    {
        if (is_null($value))
            return;

        $this->attributes['data_validade_cnh'] = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }

    public function setDataEmissaoCtpsAttribute($value)
    {
        if (is_null($value))
            return;

        $this->attributes['data_emissao_ctps'] = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }

    public function setDataAdmissaoAttribute($value)
    {
        if (is_null($value))
            return;

        $this->attributes['data_admissao'] = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }

    public function setDataConcessaoAposentadoriaAttribute($value)
    {
        if (is_null($value))
            return;

        $this->attributes['data_concessao_aposentadoria'] = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }

    public function setDataConcessaoPensaoAttribute($value)
    {
        if (is_null($value))
            return;

        $this->attributes['data_concessao_pensao'] = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }

    public function setTelefoneFixoAttribute($value)
    {
        $this->attributes['telefone_fixo'] = $this->removeMask($value);
    }

    public function setFoneCelularAttribute($value)
    {
        $this->attributes['fone_celular'] = $this->removeMask($value);
    }

    public function setCpfAttribute($value)
    {
        $this->attributes['cpf'] = $this->removeMask($value);
    }

    public function setNumeroCtpsAttribute($value)
    {
        $this->attributes['numero_ctps'] = $this->removeMask($value);
    }

    public function setPisAttribute($value)
    {
        $this->attributes['pis'] = $this->removeMask($value);
    }

    public function setCpfMaeAttribute($value)
    {
        $this->attributes['cpf_mae'] = $this->removeMask($value);
    }

    public function setCpfPaiAttribute($value)
    {
        $this->attributes['cpf_pai'] = $this->removeMask($value);
    }

    /***************************************************************************************
     * Relações 1 x N
     */
    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function marital_status()
    {
        return $this->belongsTo(MartialStatus::class);
    }

    public function instruction()
    {
        return $this->belongsTo(Instruction::class);
    }

    public function physical_disability()
    {
        return $this->belongsTo(PhysicalDisability::class);
    }

    public function races()
    {
        return $this->belongsTo(Race::class);
    }

    public function public_place()
    {
        return $this->belongsTo(PublicPlace::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function appointment()
    {
        return $this->hasOne(Appointment::class);
    }

    /***************************************************************************************
     * Relações N x N
     */
    public function founder_servant()
    {
        return $this->belongsToMany(Founder::class);
    }

    public function dependent_servant()
    {
        return $this->belongsToMany(Dependent::class)->withPivot('kinship_id');
    }

    public function servant_time()
    {
        return $this->belongsToMany(Time::class)->withPivot('data_inicio', 'data_fim', 'tipo_vinculo', 'tipo_regime_trabalho', 'caracteristicas_especiais');
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

    /***************************************************************************************
     * Filters
     */

    public function search(array $data)
    {
        $result = $this->where(function ($query) use ($data) {
            if (isset($data['tipo']))
                if($data['tipo'] == 'pendentes')
                    $query->where([['parcial', 0], ['finalizado', 0]]);
                else if ($data['tipo'] == 'parciais')
                    $query->where([['parcial', 1], ['finalizado', 0]]);
                else if ($data['tipo'] == 'finalizados')
                    $query->where([['parcial', 0], ['finalizado', 1]]);

            if (isset($data['sexo']))
                $query->where('sexo', $data['sexo']);

            if (isset($data['data_inicio']) && isset($data['data_fim']))
                $query->whereBetween('updated_at', [$data['data_inicio'], $data['data_fim']]);
        })
        ->orderBy('nome')
        ->get();

        return $result;
    }
}
