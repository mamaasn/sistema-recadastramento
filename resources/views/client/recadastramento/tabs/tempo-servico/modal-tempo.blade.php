@php $regime = [ 'RGPS Privado' => 'RGPS Privado', 'RGPS Público' => 'RGPS Público', 'RPPS' => 'RPPS', 'Privado Vínculo
Ativo'
=> 'Privado Vínculo Ativo', 'Público Vínculo Ativo' => 'Público Vínculo Ativo', 'Militar' => 'Militar', ]
@endphp

<div id="modal-tempo" tabindex="-1" role="dialog" aria-labelledby="myModalLabelLarge" aria-hidden="true" class="modal fade">
    <div id="load-modal-tempo" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tempo de Serviço</h4>
            </div>
            <div class="modal-body">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Cadastrar Tempo Anterior
                        </h4>
                    </div>
                    </h4>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="data_inicio">Data de Inicio</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        {!! Form::text('data_inicio', null, ['class' => 'form-control', 'id' =>
                                        'data_inicio', 'maxlength' => '10']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="data_fim">Data de Fim</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        {!! Form::text('data_fim', null, ['class' => 'form-control', 'id' =>
                                        'data_fim', 'maxlength' => '10']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="razao_social">Razão Social</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-signature"></i>
                                        </div>
                                        {!! Form::text('razao_social', null, ['class' => 'form-control', 'id'
                                        =>
                                        'razao_social', 'maxlength' => '30']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cnpj">CNPJ</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </div>
                                        {!! Form::text('cnpj', null, ['class' => 'form-control', 'id' =>
                                        'cnpj',
                                        'maxlength' => '19']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="natureza_juridica">Natureza Juridica do Empregador</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        {!! Form::select('natureza_juridica', ['Pública' => 'Pública',
                                        'Privada' =>
                                        'Privada'], null, ['class' => 'form-control',
                                        'id' => 'natureza_juridica', 'style' => 'width: 100%'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tipo_regime_trabalho">Tipo do Regime de Trabalho</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        {!! Form::select('tipo_regime_trabalho', $regime, null, ['class' =>
                                        'form-control', 'id' => 'tipo_regime_trabalho', 'style' => 'width: 100%'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tipo_vinculo">Tipo de Vínculo</label><small> (CLT, Prazo
                                        determinado...)</small>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-link"></i>
                                        </div>
                                        {!! Form::text('tipo_vinculo', null, ['class' => 'form-control', 'id'
                                        =>
                                        'tipo_vinculo', 'maxlength' => '30']) !!}
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
                                        {!! Form::select('caracteristicas_especiais', ['Nenhum' => 'Nenhum', 'Professor' => 'Professor', 'Exposição Agente/Nocivo' => 'Exposição Agente/Nocivo'],
                                        null,
                                        ['class' => 'form-control', 'id' => 'caracteristicas_especiais', 'style' => 'width: 100%'])!!}
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="numero_ctc">Numero da CTC</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </div>
                                        {!! Form::text('numero_ctc', null, ['class' => 'form-control', 'id' =>
                                        'numero_ctc', 'maxlength' => '30']) !!}
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        {{-- <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="ctc">Enviar CTC &nbsp;</label><small class="label label-danger">*Somente
                                        arquivo no formato pdf</small>
                                    <input class="filestyle" type="file" accept="application/pdf" name="ctc" id="ctc">
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success btn-save-times">Salvar</button>
            </div>
        </div>
    </div>
</div>