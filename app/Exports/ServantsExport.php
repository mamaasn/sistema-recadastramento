<?php

namespace App\Exports;

use App\Servant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;

class ServantsExport implements FromArray
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $objeto = DB::select("SELECT
                servants.nome,
                servants.data_nascimento,
                -- cutis
                physical_disabilities.codigo as 'deficiencia fisica',
                servants.alergia_medicamentos,
                servants.altura,
                servants.peso,
                servants.tipo_sanguineo,
                servants.doador,
                servants.observacoes, -- sinais
                servants.sexo,
                races.codigo as 'raca',
                servants.cor_olhos,
                servants.cor_cabelo,
                servants.email,
                servants.telefone_fixo,
                servants.fone_celular,
                nationalities.codigo as 'nacionalidade',
                servants.ano_chegada,
                martial_statuses.codigo as 'estado civil',
                instructions.codigo as 'instrucao',
                servants.cidade_nascimento,
                servants.uf_nascimento,
                servants.registro_nascimento,
                servants.livro,
                servants.folha,
                servants.logradouro,
                servants.numero,
                servants.bairro,
                servants.complemento,
                servants.cidade,
                servants.uf_endereco,
                servants.cep,
                servants.cpf,
                servants.numero_rg,
                servants.orgao_rg,
                servants.data_emissao_rg,
                servants.uf_rg,
                servants.numero_ctps,
                servants.serie_ctps,
                servants.uf_ctps,
                servants.numero_titulo,
                servants.zona_titulo,
                servants.secao_titulo,
                servants.uf_titulo,
                servants.numero_cnh,
                servants.uf_cnh,
                servants.data_expedicao_cnh,
                servants.data_validade_cnh,
                servants.categoria_cnh,
                servants.pis,
                servants.reservista,
                servants.numero_documento_profissional,
                servants.tipo_documento_profissional,
                servants.uf_documento_profissional,
                servants.nome_pai,
                servants.cpf_pai,
                servants.nome_mae,
                servants.cpf_mae,
                servants.updated_at
            FROM
                servants
            LEFT JOIN 
                physical_disabilities
            ON
                servants.physical_disability_id = physical_disabilities.id
            LEFT JOIN
                races
            ON
                servants.race_id = races.id
            LEFT JOIN
                nationalities
            ON
                servants.nationality_id = nationalities.id
            LEFT JOIN
                martial_statuses
            ON
                servants.martial_status_id = martial_statuses.id
            LEFT JOIN
                instructions
            ON
                servants.instruction_id = instructions.id"
        );

        //return dd(collect($objeto));


        return $objeto; //Servant::all();
    }
}
