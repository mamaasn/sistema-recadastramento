<div class="tab-pane" id="tab_4">
    <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-user"></i> Dependentes</div>
        <div class="panel-body">
            @if(!$servant->finalizado)
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-search-dependente">
                Pesquisar Dependente
            </button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-dependente">
                Novo Dependente
            </button>
            @endif
            <br>
            <br>
            <div id="msg-alerts-dependent"></div>
            <hr>
            <table class="table table-bordered table-striped table-dependents">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th>Visualizar</th>
                        <th>Desassociar</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th>Visualizar</th>
                        <th>Desassociar</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- /.tab-pane -->

@include('client.recadastramento.tabs.dependentes.modal-dependentes')

<div id="modal-show-dependente" tabindex="-1" role="dialog" aria-labelledby="myModalLabelLarge" aria-hidden="true"
    class="modal fade">
    <div id="load-modal-show-dependente" class="modal-dialog modal-lg">

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
                                    <div id="modal_nome_dependente"></div>

                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="sexo_dependente">Sexo</label>
                                    <div id="modal_sexo_dependente"></div>

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="data_nascimento_dependente">Data Nascimento</label>
                                    <div id="modal_data_nascimento_dependente"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cidade_nascimento_depedente">Cidade de Nascimento</label>
                                    <div id="modal_cidade_nascimento_dependente"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="uf_nascimento_dependente">UF de Nascimento</label>
                                    <div id="modal_uf_nascimento_dependente"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="kinship_id">Parentesco</label>
                                    <div id="modal_parentesco_dependente"></div>
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tipo_dependencia">Tipo de Dependencia</label>
                                    <div id="modal_tipo_dependencia_dependente"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="deficiente">É Deficiente?</label>
                                    <div id="modal_deficiente_dependente"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="invalido">É Inválido para o Trabalho?</label>
                                    <div id="modal_invalido_dependente"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="universitario">É Universitário?</label>
                                    <div id="modal_universitario_dependente"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="naturalidade_dependente">Naturalidade</label>
                                    <div id="modal_naturalidade_dependente"></div>
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
                                    <div id="modal_cpf_dependente"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="numero_rg_dependente">RG</label>
                                    <div id="modal_numero_rg_dependente"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="data_emissao_rg_dependente">Data de Expedição</label>
                                    <div id="modal_data_emissao_rg_dependente"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="orgao_rg_dependente">Orgao Emissor</label>
                                    <div id="modal_orgao_rg_dependente"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="uf_rg_dependente">Estado do RG</label>
                                    <div id="modal_uf_rg_dependente"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="numero_livro_cartorio">Número do Livro</label>
                                    <div id="modal_numero_livro_dependente"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="numero_folha_cartorio">Número da Folha</label>
                                    <div id="modal_folha_dependente"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nome_cartorio">Nome do Cartorio de Registro</label>
                                    <div id="modal_nome_cartorio_dependente"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="numero_registro_cartorio">Número do Registro</label>
                                    <div id="modal_registro_dependente"></div>
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
                                    <div id="modal_mae_dependente"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nome_pai_dependente">Nome do Pai</label>
                                    <div id="modal_pai_dependente"></div>
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
                <button onclick="atualizarDependente()" type="button" class="btn btn-info">Atualizar</button>

            </div>
        </div>
    </div>
</div>

<div id="modal-search-dependente" tabindex="-1" role="dialog" aria-labelledby="myModalLabelLarge" aria-hidden="true"
    class="modal fade">
    <div id="load-modal-search-dependente" class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pesquisar depedentes</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div id="validation-dependent" class="form-group has-feedback">
                            {!! Form::text('searchDependent', null, ['class' => 'form-control', 'id' =>
                            'searchDependent',
                            'minlenght' => '3', 'placeholder' => 'Digite o nome do Dependente para pesquisar']) !!}
                            <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
                            <span class="help-block">
                                <strong id="error-dependent"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <button type="button" id="btnSearchDependent" class="btn btn-info">
                            <i class="fa fa-search"></i>
                            Pesquisar
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <h3>Resultados encontrados</h3>
                        <table class="table table-bordered table-striped table-search-dependents">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>RG</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>RG</th>
                                    <th>Ações</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-danger fade" id="desassociateDependent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Desvincular Depedente</h4>
            </div>
            <div class="modal-body">
                <p>
                    Deseja realmente desvincular esse dependente?
                    * Esta ação não poderá ser desfeita.
                </p>
                <div class="modal-footer">
                    <button type="button" id="btn-cancel" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="btn-desassociate-dependent" class="btn btn-outline">Desvincular</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="modal-vincular-dependent" tabindex="-1" role="dialog" aria-labelledby="myModalLabelLarge" aria-hidden="true"
    class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Vincular ao servidor</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="data_inicio_vinculo">Parentesco</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                {!! Form::select('parentesco_dependente', $kinships, null, ['class' => 'form-control',
                                'id' =>'parentesco_dependente', 'style' => 'width: 100%']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" id="btn-cancel-dependent" class="btn btn-default" data-dismiss="modal">Sair</button>
                <button type="button" id="btn-associate-dependent" class="btn btn-success ">Vincular</button>
            </div>
        </div>
    </div>
</div>