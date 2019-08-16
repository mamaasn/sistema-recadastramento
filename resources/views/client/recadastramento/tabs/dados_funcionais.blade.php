@php 
$beneficio = [ 
    'Aposentadoria Compulsória' => 'Aposentadoria Compulsória', 
    'Aposentadoria por Idade' => 'Aposentadoria por Idade', 
    'Aposentadoria por Invalidez' => 'Aposentadoria por Invalidez', 
    'Aposentadoria por Tempo de Contribuição' => 'Aposentadoria por Tempo de Contribuição', 
    'Pensão por Morte' => 'Pensão por Morte', 
]
@endphp
<div class="tab-pane" id="tab_2">
    <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-address-card"></i> Dados Funcionais</div>

        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="matricula">Matrícula</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>
                            {!! Form::text('matricula', null, ['class' => 'form-control', 'id' =>
                            'matricula', 'maxlenght' => '30']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-building"></i>
                            </div>
                            {!! Form::text('cargo', null, ['class' => 'form-control', 'id' =>
                            'cargo', 'maxlenght' => '30']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="data_admissao">Data Admissão</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            {!! Form::text('data_admissao', null, ['class' => 'form-control', 'id' =>
                            'data_admissao', 'maxlenght' => '30']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="orgao">Local de Trabalho: Órgão</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-building"></i>
                            </div>
                            {!! Form::text('orgao', null, ['class' => 'form-control', 'id' =>
                            'orgao', 'maxlenght' => '100']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="departamento">Local de Trabalho: Departamento</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-building"></i>
                            </div>
                            {!! Form::text('departamento', null, ['class' => 'form-control', 'id' =>
                            'departamento', 'maxlenght' => '100']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="tipo_beneficio">Tipo de Benefício</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fas fa-list"></i>
                            </div>
                            {!! Form::select('tipo_beneficio', $beneficio, null, ['class' => 'form-control', 'id' => 'tipo_beneficio', 'style' => 'width: 100%']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="data_concessao_beneficio">Data de Concessão do Benefício</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            @if($servant->data_concessao_aposentadoria)
                            {!! Form::text('data_concessao_aposentadoria', null, ['class' => 'form-control', 'id' =>
                            'data_concessao_beneficio', 'maxlenght' => '10']) !!}
                            @else
                            {!! Form::text('data_concessao_pensao', null, ['class' => 'form-control', 'id' =>
                            'data_concessao_beneficio', 'maxlenght' => '10']) !!}
                            @endif
                        </div>
                    </div>
                </div>
                <div id="numero_beneficio" class="col-sm-4">
                    <div class="form-group">
                        <label for="numero_concessao_aposentadoria">Número de Concessão da Aposentadoria</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-sort-numeric-up"></i>
                            </div>
                            {!! Form::text('numero_concessao_aposentadoria', null, ['class' => 'form-control', 'id' =>
                            'numero_concessao_aposentadoria', 'maxlenght' => '30']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.tab-pane -->