<?php

namespace App\Imports;

use App\Models\Client\Servant;
use Maatwebsite\Excel\Concerns\ToModel;

class ServantsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    
    public function model(array $row)
    {
        if ($row[0] == null)
            return;

        $i = 0;
        return new Servant([
            'registro'                                      => $row[$i++],
            'matricula'                                     => $row[$i++],
            'nome'                                          => $row[$i++],
            'sexo'                                          => $row[$i++],
            'cpf'                                           => $row[$i++],
            'nome_mae'                                      => $row[$i++],
            'cpf_mae'                                       => $row[$i++],
            'nome_pai'                                      => $row[$i++],
            'cpf_pai'                                       => $row[$i++],
            'data_nascimento'                               => $row[$i++],
            'uf_nascimento'                                 => $row[$i++],
            'cidade_nascimento'                             => $row[$i++],
            'registro_nascimento'                           => $row[$i++],
            'livro'                                         => $row[$i++],
            'folha'                                         => $row[$i++],
            'ano_chegada'                                   => $row[$i++],
            'medicamentos'                                  => $row[$i++],
            'altura'                                        => $row[$i++],
            'peso'                                          => $row[$i++],
            'cor_olhos'                                     => $row[$i++],
            'cor_cabelo'                                    => $row[$i++],
            'numero_rg'                                     => $row[$i++],
            'orgao_rg'                                      => $row[$i++],
            'uf_rg'                                         => $row[$i++],
            'data_emissao_rg'                               => $row[$i++],
            'numero_titulo'                                 => $row[$i++],
            'zona_titulo'                                   => $row[$i++],
            'secao_titulo'                                  => $row[$i++],
            'uf_titulo'                                     => $row[$i++],
            'numero_ctps'                                   => $row[$i++],
            'serie_ctps'                                    => $row[$i++],
            'uf_ctps'                                       => $row[$i++],
            'data_emissao_ctps'                             => $row[$i++],
            'numero_documento_profissional'                 => $row[$i++],
            'tipo_documento_profissional'                   => $row[$i++],
            'uf_documento_profissional'                     => $row[$i++],
            'pis'                                           => $row[$i++],
            'reservista'                                    => $row[$i++],
            'numero_cnh'                                    => $row[$i++],
            'uf_cnh'                                        => $row[$i++],
            'data_expedicao_cnh'                            => $row[$i++],
            'data_validade_cnh'                             => $row[$i++],
            'categoria_cnh'                                 => $row[$i++],
            'cep'                                           => $row[$i++],
            'logradouro'                                    => $row[$i++],
            'bairro'                                        => $row[$i++],
            'numero'                                        => $row[$i++],
            'uf_endereco'                                   => $row[$i++],
            'cidade'                                        => $row[$i++],
            'cidade_codigo_ibge'                            => $row[$i++],
            'complemento'                                   => $row[$i++],
            'telefone_fixo'                                 => $row[$i++],
            'fone_celular'                                  => $row[$i++],
            'email'                                         => $row[$i++],
            'observacoes'                                   => $row[$i++],
            'cargo'                                         => $row[$i++],
            'data_admissao'                                 => $row[$i++],
            'orgao'                                         => $row[$i++],
            'departamento'                                  => $row[$i++],
            'data_concessao_aposentadoria'                  => $row[$i++],
            'numero_concessao_aposentadoria'                => $row[$i++],
            // 'data_concessao_pensao'                         => $row[$i++],
        ]);
    }
}
