<div class="tab-pane" id="tab_5">
    <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-user"></i> Instituidor</div>
        <div class="panel-body">
            @if(!$servant->finalizado)
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-search-founder">
                Pesquisar Instituidor
            </button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-instituidor">
                Novo Instituidor
            </button>
            @endif
            <br>
            <br>
            <div id="msg-alerts-founder"></div>
            <hr>
            <table class="table-founders table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Visualizar</th>
                        <th>Desvincular</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Visualizar</th>
                        <th>Desvincular</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>

<!-- /.tab-pane -->
    @include('client.recadastramento.tabs.instituidores.modal-instituidores')

<div class="modal modal-danger fade" id="desassociateFounder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Desassociar Instituidor</h4>
            </div>
            <div class="modal-body">
                <p>
                    Deseja realmente desvincular esse instituidor? * Esta ação não poderá ser desfeita.
                </p>
                <div class="modal-footer">
                    <button type="button" id="btn-cancel-founder" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="btn-desassociate-founder" class="btn btn-outline">Desvincular</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal-show-founder" tabindex="-1" role="dialog" aria-labelledby="myModalLabelLarge" aria-hidden="true" class="modal fade">
    <div id="load-modal-show-dependente" class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Dependente</h4>
            </div>

            <div class="modal-body">

                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-user"></i>Novo Instituidor</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nome_instituidor">Nome</label>
                                    <div id="modal_nome_instituidor"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cpf_instituidor">CPF</label>
                                    <div id="modal_cpf_instituidor"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="sexo_instituidor">Sexo</label>
                                    <div id="modal_sexo_instituidor"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="uf_instituidor">UF</label>
                                    <div id="modal_uf_instituidor"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nacionalidade_instituidor">Nacionalidade</label>
                                    <div id="modal_nacionalidade_instituidor"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="data_nascimento_instituidor">Data de Nascimento</label>
                                    <div id="modal_data_nascimento_instituidor"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="data_falecimento_instituidor">Data de Falecimento</label>
                                    <div id="modal_data_falecimento_instituidor"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                <button onclick="atualizarInstituidor()" type="button" class="btn btn-info">Atualizar</button>
            </div>
        </div>
    </div>
</div>

<div id="modal-search-founder" tabindex="-1" role="dialog" aria-labelledby="myModalLabelLarge" aria-hidden="true" class="modal fade">
    <div id="load-modal-search-founder" class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pesquisar instituidores</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div id="validation-founder" class="form-group has-feedback">
                            {!! Form::text('searchFounder', null, ['class' => 'form-control', 'id' => 'searchFounder', 'minlenght' => '3', 'placeholder'
                            => 'Digite o nome do Instituidor para pesquisar']) !!}
                            <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
                            <span class="help-block">
                                <strong id="error-founder"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <button type="button" id="btnSearchFounder" class="btn btn-info">
                            <i class="fa fa-search"></i>
                            Pesquisar
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <h3>Resultados encontrados</h3>
                        <table class="table table-bordered table-striped table-search-founders">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Data de Nascimento</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Data de Nascimento</th>
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