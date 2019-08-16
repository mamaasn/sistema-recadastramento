<?php

namespace App\Imports;

use App\Models\Client\Dependent;
use Maatwebsite\Excel\Concerns\ToModel;

class DependentsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $i = 0;
        if ($row[0] == null)
            return;
        return new Dependent([
            'nome'                              => $row[$i++],
            'cpf'                               => $row[$i++],
            'numero_rg'                         => $row[$i++],
            'orgao_rg'                          => $row[$i++],
            'uf_rg'                             => $row[$i++],
            'data_emissao_rg'                   => $row[$i++],
            'sexo'                              => $row[$i++],
            'data_nascimento'                   => $row[$i++],
            'nome_mae'                          => $row[$i++],
            'nome_pai'                          => $row[$i++],
            'cidade_nascimento'                 => $row[$i++],
            'uf_nascimento'                     => $row[$i++],
            'nome_cartorio'                     => $row[$i++],
            'numero_registro_cartorio'          => $row[$i++],
            'numero_livro_cartorio'             => $row[$i++],
            'numero_folha_cartorio'             => $row[$i++],
            'naturalidade'                      => $row[$i++],
            'tipo_dependencia'                  => $row[$i++],
        ]);
    }
}
