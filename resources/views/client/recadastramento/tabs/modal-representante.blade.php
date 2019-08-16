<div id="modal-representante" tabindex="-1" role="dialog" aria-labelledby="myModalLabelLarge" aria-hidden="true" class="modal fade">
    <div id="load-modal-representante" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Representante Legal / Procurador Habilitado</h4>
            </div>
            <div class="modal-body">

                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-user"></i> Dados Representante Legal / Procurador
                        Habilitado</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nome_representante">Nome Completo</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        {!! Form::text('nome_representante', null, ['class' => 'form-control', 'id' =>
                                        'nome_representante', 'maxlength' => '60']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cpf_representante">CPF</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </div>
                                        {!! Form::text('cpf_representante', null, ['class' => 'form-control', 'id' =>
                                        'cpf_representante']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="sexo_representante">Sexo</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-transgender-alt"></i>
                                        </div>
                                        {!! Form::select('sexo_representante', ['F' => 'Feminino', 'M' => 'Masculino'],
                                        null, ['class' => 'form-control', 'id' => 'sexo_representante', 'style' =>
                                        'width:100%']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group numero_rg_class">
                                    <label for="numero_rg_representante">RG</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-address-card"></i>
                                        </div>
                                        {!! Form::text('numero_rg_representante', null, ['class' => 'form-control',
                                        'id' =>
                                        'numero_rg_representante', 'maxlength' => '15']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="data_emissao_rg_representante">Data Emissão do RG</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-alt"></i>
                                        </div>
                                        {!! Form::text('data_emissao_rg_representante', null, ['class' =>
                                        'form-control', 'id' => 'data_emissao_rg_representante',
                                        'maxlength' => '10',]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="orgao_rg_representante">Orgão Expedidor/Emissor do RG (Ex: SSP)</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marked-alt"></i>
                                        </div>
                                        {!! Form::text('orgao_rg_representante', null, ['class' => 'form-control', 'id'
                                        => 'orgao_rg_representante',
                                        'maxlength' => '8']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="data_nascimento_representante">Data de Nascimento</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-alt"></i>
                                        </div>
                                        {!! Form::text('data_nascimento_representante', null, ['class' =>
                                        'form-control', 'id' => 'data_nascimento_representante',
                                        'maxlength' => '10',]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="martial_status_id_representante">Estado Civil</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-flag"></i>
                                        </div>
                                        {!! Form::select('martial_status_id_representante', $maritalStatus, null,
                                        ['class' => 'form-control
                                        ', 'id' => 'martial_status_id_representante', 'style' => 'width: 100%']) !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-map-marked-alt"></i> Endereço Representante Legal /
                        Procurador Habilitado</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="logradouro_representante">Logradouro</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marked-alt"></i>
                                        </div>
                                        {!! Form::text('logradouro_representante', null, ['class' => 'form-control',
                                        'id' =>
                                        'logradouro_representante', 'maxlength' => '70']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="bairro_representante">Bairro</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marked-alt"></i>
                                        </div>
                                        {!! Form::text('bairro_representante', null, ['class' => 'form-control', 'id'
                                        => 'bairro_representante',
                                        'maxlength' => '72']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="numero_representante">Número</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marked-alt"></i>
                                        </div>
                                        {!! Form::text('numero_representante', null, ['class' => 'form-control', 'id'
                                        => 'numero_representante',
                                        'maxlength' => '10']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cidade_representante">Cidade</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marked-alt"></i>
                                        </div>
                                        {!! Form::text('cidade_representante', null, ['class' => 'form-control', 'id'
                                        => 'cidade_representante',
                                        'maxlength' => '30']) !!}
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="uf_endereco_representante">UF</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marked-alt"></i>
                                        </div>
                                        {!! Form::text('uf_endereco_representante', null, ['class' => 'form-control',
                                        'id' =>
                                        'uf_endereco_representante', 'maxlength' => '2']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="complemento_representante">Complemento</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marked-alt"></i>
                                        </div>
                                        {!! Form::text('complemento_representante', null, ['class' => 'form-control',
                                        'id' =>
                                        'complemento_representante', 'maxlength' => '20']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-phone"></i> Contato Representante Legal / Procurador
                        Habilitado</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="telefone_fixo_representante">Telefone Fixo</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        {!! Form::text('telefone_fixo_representante', null, ['class' => 'form-control',
                                        'id' =>
                                        'telefone_fixo_representante', 'maxlength' => '15']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="fone_celular_representante">Telefone Celular</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-mobile-alt"></i>
                                        </div>
                                        {!! Form::text('fone_celular_representante', null, ['class' => 'form-control',
                                        'id' =>
                                        'fone_celular_representante','maxlength' => '40']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="email_representante">E-mail</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        {!! Form::email('email_representante', null, ['class' => 'form-control', 'id'
                                        =>
                                        'email_representante', 'maxlength' => '30']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                <button type="button" class="btn btn-success btn-save-founder">Salvar</button>
            </div>
        </div>
    </div>
</div>