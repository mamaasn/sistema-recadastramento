<div class="tab-pane" id="tab_6">
    <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-user"></i> Documentos Entregues </div>

        <div class="panel-body">
            <div class="row">

                <div class="col-sm-2">
                    <div class="form-group documento_entregue_rg_class">
                        <div class="checkbox c-checkbox">
                            <label>
                                {!! Form::checkbox('documento_entregue_rg', null) !!}
                                RG
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <div class="checkbox c-checkbox">
                            <label>
                                {!! Form::checkbox('documento_entregue_cpf', null) !!}
                                CPF
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-2">
                    <div class="form-group">
                        <div class="checkbox c-checkbox">
                            <label>
                                {!! Form::checkbox('documento_entregue_ctc_inss', null) !!}
                                CTC Inss
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="checkbox c-checkbox">
                            <label>
                                {!! Form::checkbox('documento_entregue_ctc_regime_proprio', null) !!}
                                CTC Regime Próprio
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <div class="checkbox c-checkbox">
                            <label>
                                {!! Form::checkbox('documento_entregue_ctps', null) !!}
                                CTPS
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <div class="checkbox c-checkbox">
                            <label>
                                {!! Form::checkbox('documento_entregue_foto', null) !!}
                                Foto
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <div class="checkbox c-checkbox">
                            <label>
                                {!! Form::checkbox('documento_entregue_certidao_nascimento', null) !!}
                                Certidão Única de Cartório
                            </label>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label class="btn btn-default" for="">Selecionar todos</label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="observacoes_documentos">Observação (Documentos)</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>
                            {!! Form::textarea('observacoes_documentos', null, ['class' => 'form-control', 'id' =>
                            'observacoes_documentos', 'maxlength' => '100', 'rows' => '3']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-user"></i> Enviar documentos</div>
        <div class="panel-body">
            <div class="row">
                @if(!$servant->finalizado)
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="arquivos">Enviar documentos &nbsp;</label><small class="label label-danger">*Somente
                            arquivos no formato pdf</small>
                        <input class="filestyle" type="file" accept="application/pdf" name="arquivos[]" id="arquivos"
                            multiple>
                    </div>
                </div>
                @endif
                <div class="col-sm-4">
                    <div class="form-group">
                        <button style="margin-top: 25px" id="enviarDoc" type="button" class="bounceInRight delay-2s btn btn-success">
                            Enviar documentos
                        </button>
                    </div>
                </div>
                <div id="msgs-alerts" class="col-sm-12">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="title">Listagem de documentos enviados</h4>
                    <table id="table-documents" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nome do Arquivo</th>
                                <th>Download</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nome do Arquivo</th>
                                <th>Download</th>
                                <th>Excluir</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal modal-danger fade" id="deleteFileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Deletar arquivo</h4>
            </div>
            <div class="modal-body">
                <p>
                    Deseja realmente Deletar esse arquivo?
                    * Esta ação não poderá ser desfeita.
                </p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-outline btn-delete-file">Deletar</button>
                </div>
            </div>
        </div>
    </div>
</div>