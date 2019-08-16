<div id="modal-dependente" tabindex="-1" role="dialog" aria-labelledby="myModalLabelLarge" aria-hidden="true" class="modal fade">
    <div id="load-modal-dependente" class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Dependente</h4>
            </div>

            <div class="modal-body">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">Dados Depedente</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nome_dependente">Nome</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        {!! Form::text('nome_dependente', null, ['class' => 'form-control', 'id' =>
                                        'nome_dependente', 'maxlength' => '60']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="sexo_dependente">Sexo</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-flag"></i>
                                        </div>
                                        {!! Form::select('sexo_dependente', ['F' => 'Feminino', 'M' => 'Masculino'],
                                        null,
                                        ['class' =>
                                        'form-control', 'id' => 'sexo_dependente', 'style' => 'width: 100%'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="data_nascimento_dependente">Data Nascimento</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-alt"></i>
                                        </div>
                                        {!! Form::text('data_nascimento_dependente', null, ['class' => 'form-control',
                                        'id' =>
                                        'data_nascimento_dependente', 'maxlength' => '10']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cidade_nascimento_depedente">Cidade de Nascimento</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marked-alt"></i>
                                        </div>
                                        {!! Form::text('cidade_nascimento_depedente', null, ['class' => 'form-control',
                                        'id' =>
                                        'cidade_nascimento_dependente', 'maxlength' => '30']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="uf_nascimento_dependente">UF de Nascimento</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marked-alt"></i>
                                        </div>
                                        {!! Form::text('uf_nascimento_dependente', null, ['class' => 'form-control', 'id' =>
                                        'uf_nascimento_dependente',
                                        'maxlength' => '2']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="kinship_id">Parentesco</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-flag"></i>
                                        </div>
                                        {!! Form::select('kinship_id', $kinships, null, ['class' => 'form-control
                                        ', 'id' => 'kinship_id', 'style' => 'width: 100%']) !!}
                                    </div>

                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tipo_dependencia">Tipo de Dependencia</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info-circle"></i>
                                        </div>
                                        {!! Form::text('tipo_dependencia', null, ['class' => 'form-control', 'id' =>
                                        'tipo_dependencia', 'maxlength' => '30']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="deficiente">É Deficiente?</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-flag"></i>
                                        </div>
                                        {!! Form::select('deficiente', ['N' => 'Não', 'S' => 'Sim'], null, ['class' =>
                                        'form-control', 'id' => 'deficiente', 'maxlength' => '30', 'style' => 'width: 100%'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="invalido">É Inválido para o Trabalho?</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-flag"></i>
                                        </div>
                                        {!! Form::select('invalido', ['N' => 'Não', 'S' => 'Sim'], null, ['class' =>
                                        'form-control', 'id' => 'invalido', 'style' => 'width: 100%'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="universitario">É Universitário?</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-school"></i>
                                        </div>
                                        {!! Form::select('universitario', ['N' => 'Não', 'S' => 'Sim'], null, ['class'
                                        =>
                                        'form-control', 'id' => 'universitario', 'style' => 'width: 100%'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="naturalidade_dependente">Naturalidade</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-flag"></i>
                                        </div>
                                        {!! Form::text('naturalidade_dependente', null, ['class' => 'form-control', 'id' => 'naturalidade_dependente', 'maxlength' => '30'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-user"></i> Documentos</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cpf_dependente">CPF</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </div>
                                        {!! Form::text('cpf_dependente', null, ['class' => 'form-control', 'id' => 'cpf_dependente', 'maxlength' => '20']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="numero_rg_dependente">RG</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </div>
                                        {!! Form::text('numero_rg_dependente', null, ['class' => 'form-control', 'id' => 'numero_rg_dependente']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="data_emissao_rg_dependente">Data de Expedição</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        {!! Form::text('data_emissao_rg_dependente', null, ['class' => 'form-control', 'id' => 'data_emissao_rg_dependente']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="orgao_rg_dependente">Orgao Emissor</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        {!! Form::text('orgao_rg_dependente', null, ['class' => 'form-control', 'id' => 'orgao_rg_dependente', 'maxlength' => '8']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="uf_rg_dependente">Estado do RG</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        {!! Form::text('uf_rg_dependente', null, ['class' => 'form-control', 'id' => 'uf_rg_dependente', 'maxlength' => '2']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="numero_livro_cartorio">Número do Livro</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-sort-numeric-up"></i>
                                        </div>
                                        {!! Form::text('numero_livro_cartorio', null, ['class' =>  'form-control', 'id' => 'numero_livro_cartorio', 'maxlength' => '10']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="numero_folha_cartorio">Número da Folha</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-sort-numeric-up"></i>
                                        </div>
                                        {!! Form::text('numero_folha_cartorio', null, ['class' => 'form-control', 'id' => 'numero_folha_cartorio', 'maxlength' => '10']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nome_cartorio">Nome do Cartorio de Registro</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-signature"></i>
                                        </div>
                                        {!! Form::text('nome_cartorio', null, ['class' => 'form-control', 'id' => 'nome_cartorio', 'maxlength' => '60']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="numero_registro_cartorio">Número do Registro</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-sort-numeric-up"></i>
                                        </div>
                                        {!! Form::text('numero_registro_cartorio', null, ['class' => 'form-control', 'id' =>  'numero_registro_cartorio', 'maxlength' => '10']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-user"></i> Parentesco</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nome_mae_dependente">Nome da Mãe</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        {!! Form::text('nome_mae_dependente', null, ['class' => 'form-control', 'id' => 'nome_mae_dependente', 'maxlength' => '60']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nome_pai_dependente">Nome do Pai</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        {!! Form::text('nome_pai_dependente', null, ['class' => 'form-control', 'id' => 'nome_pai_dependente', 'maxlength' => '60']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                <button type="button" class="btn btn-success btn-salvar-dependente">Salvar</button>
            </div>
        </div>
    </div>
</div>