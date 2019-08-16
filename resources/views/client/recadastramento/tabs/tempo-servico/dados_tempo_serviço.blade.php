@php $regime = [ 'RGPS Privado' => 'RGPS Privado', 'RGPS Público' => 'RGPS Público', 'RPPS' => 'RPPS', 'Privado Vínculo
Ativo'
=> 'Privado Vínculo Ativo', 'Público Vínculo Ativo' => 'Público Vínculo Ativo', 'Militar' => 'Militar', ]
@endphp
<div class="tab-pane" id="tab_3">
    <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-user"></i> Tempo de Serviço</div>
        <div class="panel-body">
            @if(!$servant->finalizado)
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-search-time">
                Pesquisar Empresas
            </button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-tempo">
                Novo Tempo de Serviço
            </button>
            @endif
            <br>
            <br>
            <div id="msg-alerts-times"></div>
            <hr>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="numero_ctc_inss">Número CTC Inss</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            {!! Form::text('numero_ctc_inss', null, ['class' => 'form-control', 'id' => 'numero_ctc_inss']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                        <div class="form-group">
                            <label for="numero_ctc_regime_proprio">Número CTC Regime Próprio</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-flag"></i>
                                </div>
                                {!! Form::text('numero_ctc_regime_proprio', null, ['class' => 'form-control', 'id' => 'numero_ctc_regime_proprio']) !!}
                            </div>
                        </div>
                    </div>
            </div>
            <table class="table table-bordered table-striped table-times">
                <thead>
                    <tr>
                        <th>Razão Social</th>
                        <th>Data de Início</th>
                        <th>Data do Fim</th>
                        <th>Visualizar</th>
                        <th>Desvincular</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Razão Social</th>
                        <th>Data de Início</th>
                        <th>Data do Fim</th>
                        <th>Visualizar</th>
                        <th>Desvincular</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- /.tab-pane -->
@include('client.recadastramento.tabs.tempo-servico.modal-tempo')

<div class="modal modal-danger fade" id="desassociateTime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Desassociar Tempo Anterior</h4>
            </div>
            <div class="modal-body">
                <p>
                    Deseja realmente desvincular esse tempo anterior? * Esta ação não poderá ser desfeita.
                </p>
                <div class="modal-footer">
                    <button type="button" id="btn-cancel-time" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="btn-desassociate-time" class="btn btn-outline">Desvincular</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal-show-time" tabindex="-1" role="dialog" aria-labelledby="myModalLabelLarge" aria-hidden="true" class="modal fade">
    <div id="load-modal-show-time" class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tempo Anterior</h4>
            </div>

            <div class="modal-body">

                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-user"></i>Visualizar Tempo Anterior</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="modal_data_inicio">Data de Inicio</label>
                                    <div id="modal_data_inicio"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="modal_data_fim">Data Fim</label>
                                    <div id="modal_data_fim"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="modal_razao_social">Razão Social</label>
                                    <div id="modal_razao_social"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="modal_cnpj">CNPJ</label>
                                    <div id="modal_cnpj"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="modal_natureza_juridica">Natureza Júridica</label>
                                    <div id="modal_natureza_juridica"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="modal_tipo_regime_trabalho">Tipo de Regime de Trabalho</label>
                                    <div id="modal_tipo_regime_trabalho"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="modal_tipo_vinculo">Tipo de vínculo</label>
                                    <div id="modal_tipo_vinculo"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="modal_caracteristicas_especiais">Caracteristicas Especiais</label>
                                    <div id="modal_caracteristicas_especiais"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                <button onclick="atualizarTempo()" type="button" class="btn btn-info">Atualizar</button>
            </div>
        </div>
    </div>
</div>

<div id="modal-search-time" tabindex="-1" role="dialog" aria-labelledby="myModalLabelLarge" aria-hidden="true" class="modal fade">
    <div id="load-modal-search-time" class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pesquisar empresas</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div id="validation-time" class="form-group has-feedback">
                            {!! Form::text('searchTime', null, ['class' => 'form-control', 'id' => 'searchTime',
                            'minlenght' => '3', 'placeholder'
                            => 'Digite a Razão Social para pesquisar']) !!}
                            <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
                            <span class="help-block">
                                <strong id="error-time"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <button type="button" id="btnSearchTime" class="btn btn-info">
                            <i class="fa fa-search"></i>
                            Pesquisar
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <h3>Resultados encontrados</h3>
                        <table class="table table-bordered table-striped table-search-times">
                            <thead>
                                <tr>
                                    <th>Razão Social</th>
                                    <th>CNPJ</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
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

<div id="modal-vincular-time" tabindex="-1" role="dialog" aria-labelledby="myModalLabelLarge" aria-hidden="true" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Vincular ao servidor</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="data_inicio_vinculo">Data de Inicio</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                {!! Form::text('data_inicio_vinculo', null, ['class' => 'form-control', 'id' =>
                                'data_inicio_vinculo', 'maxlenght' => '10']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="data_fim_vinculo">Data de Fim</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                {!! Form::text('data_fim_vinculo', null, ['class' => 'form-control', 'id' =>
                                'data_fim_vinculo', 'maxlenght' => '10']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tipo_vinculo_vinculo">Tipo de Vínculo</label><small> (CLT, Prazo
                                determinado...)</small>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-link"></i>
                                </div>
                                {!! Form::text('tipo_vinculo_vinculo', null, ['class' => 'form-control', 'id'
                                =>
                                'tipo_vinculo_vinculo', 'maxlenght' => '30']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tipo_regime_trabalho_vinculo">Tipo do Regime de Trabalho</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                {!! Form::select('tipo_regime_trabalho_vinculo', $regime, null, ['class' =>
                                'form-control', 'id' => 'tipo_regime_trabalho_vinculo', 'style' => 'width: 100%'])!!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Caracteristicas Especiais</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock"></i>
                                </div>
                                {!! Form::select('caracteristicas_especiais_vinculo', ['Nenhum' => 'Nenhum',
                                'Professor' => 'Professor', 'ExposicaoAgenteNocivo' => 'Exposição Agente/Nocivo'],
                                null,
                                ['class' => 'form-control', 'id' => 'caracteristicas_especiais_vinculo', 'style' => 'width: 100%'])!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-cancel-time2" class="btn btn-default" data-dismiss="modal">Sair</button>
                <button type="button" id="btn-associate-time" class="btn btn-success ">Vincular</button>
            </div>
        </div>
    </div>
</div>