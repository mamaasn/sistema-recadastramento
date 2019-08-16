<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'razao_social'       =>  'unique:companies',
            'cnpj'               =>  'unique:companies',
            'nome_fantasia'      =>  'unique:companies',
            'sub_domain'         => 'unique:companies',
            'bd_database'        => 'unique:companies'
        ];
    }
    
    public function messages()
    {
        return [
            'razao_social.unique'       =>  'O valor informado para o campo Razão Social já está em uso.',
            'cnpj.unique'               =>  'O valor informado para o campo CNPJ já está em uso.',
            'nome_fantasia.unique'      =>  'O valor informado para o campo Nome Fantasia já está em uso.',
            'sub_domain.unique'         =>  'O valor informado para o campo Sub-domínio já está em uso.',
            'bd_database.unique'        =>  'O valor informado para o campo Nome do Banco de Dados já está em uso.'
        ];

    }
}
