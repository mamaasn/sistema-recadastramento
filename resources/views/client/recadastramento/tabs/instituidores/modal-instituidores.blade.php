<div id="modal-instituidor" tabindex="-1" role="dialog" aria-labelledby="myModalLabelLarge" aria-hidden="true" class="modal fade">
    <div id="load-modal-instituidor" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Instituidor</h4>
            </div>
            <div class="modal-body">

                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-user"></i>Novo Instituidor</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nome_instituidor">Nome</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        {!! Form::text('nome_instituidor', null, ['class' => 'form-control', 'id' =>
                                        'nome_instituidor', 'maxlength' => '60']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cpf_instituidor">CPF</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </div>
                                        {!! Form::text('cpf_instituidor', null, ['class' => 'form-control', 'id' =>
                                        'cpf_instituidor']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="sexo_instituidor">Sexo</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-transgender-alt"></i>
                                        </div>
                                        {!! Form::select('sexo_instituidor', ['F' => 'Feminino', 'M' => 'Masculino'],
                                        null, ['class' => 'form-control', 'id' => 'sexo_instituidor', 'style' => 'width: 100%']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="uf_instituidor">UF</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-flag-usa"></i>
                                        </div>
                                        {!! Form::text('uf_instituidor', null, ['class' => 'form-control', 'id' =>
                                        'uf_instituidor', 'maxlength' => '2']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nacionalidade_instituidor">Nacionalidade</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        {!! Form::select('nacionalidade_instituidor', $nationalities, null, ['class' =>
                                        'form-control', 'id' => 'nacionalidade_instituidor', 'style' => 'width: 100%']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="data_nascimento_instituidor">Data de Nascimento</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-alt"></i>
                                        </div>
                                        {!! Form::text('data_nascimento_instituidor', null, ['class' => 'form-control',
                                        'id' => 'data_nascimento_instituidor']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="data_falecimento_instituidor">Data de Falecimento</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-alt"></i>
                                        </div>
                                        {!! Form::text('data_falecimento_instituidor', null, ['class' =>
                                        'form-control', 'id' => 'data_falecimento_instituidor']) !!}
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