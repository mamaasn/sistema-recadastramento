<div id="modal-agendamento" tabindex="-1" role="dialog" aria-labelledby="myModalLabelLarge" aria-hidden="true" class="modal fade">
    <div id="load-modal-agendamento" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agendamento</h4>
            </div>
            <div class="modal-body">
                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">Agendar Horário</h3>
                    </div>
                    <div class="box-body">
                        <div class="panel panel-default">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="NomeInstituidor">Nome</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                {!! Form::text('Nome', null, ['class' => 'form-control', 'id'
                                                =>
                                                'Nome', 'required', isset($company) ? 'disabled' : ''])
                                                !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="CPFinstituidor">Data</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-id-card"></i>
                                                </div>
                                                {!! Form::text('CPF', null, ['class' => 'form-control',
                                                'id' =>
                                                'CPF', 'required', isset($company) ? 'disabled' : '']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="SexoInstituidor">Hora</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-transgender-alt"></i>
                                                </div>
                                                {!! Form::text('Sexo', null, ['class' => 'form-control',
                                                'id' =>
                                                'Sexo', 'required', isset($company) ? 'disabled' : '']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Sair</button>
                        <button type="button" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>