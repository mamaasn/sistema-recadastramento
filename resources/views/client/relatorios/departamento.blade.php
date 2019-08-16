@extends('adminlte::page')
@section('title', 'Departamento')
@section('content_header')
<h1>Relatório por Departamento</h1>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home2') }}">{{ session('company')['nome_fantasia'] ?? 'SisRec' }}</a>
    </li>
    <li>
        <a href="{{ route('relatorios.departamento') }}">Relatório por Departamento</a>
    </li>
</ol>

@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Relatório por Departamento</h3>
        <br>
        <br>
    </div>
    <div class="box-body">
        <div class="row">
            {!! Form::open(['route' => 'relatorios.finalizados','class' => '', 'id' => 'form']) !!}
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="data_inicio">Data Inicio</label>
                    {!! Form::select('public_place_id', $orgao, null, ['class' => 'form-control', 'id' => 'public_place_id']) !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="data_fim">Data Fim</label>
                    {!! Form::text('data_fim', null, ['class' => 'form-control', 'id' => 'data_fim']) !!}
                </div>
            </div>
            <div class="col-sm-3">
                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        {!! Form::select('sexo', ['F' => 'Feminino', 'M' => 'Masculino', 'T' => 'Todos'], null, ['class' =>
                            'form-control', 'id' => 'sexo'])!!}
                    </div>
                </div>
            <div class="col-sm-3">
                <button type="submit" style="margin-top: 25px" class="btn btn-primary">Filtrar</button>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="list-table table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Cpf</th>
                            <th>Rg</th>
                            <th>Sexo</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nome</th>
                            <th>Cpf</th>
                            <th>Rg</th>
                            <th>Sexo</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="row">
            <div class="col-sm-4">
                    <button type="button" class="btn btn-primary" type="button">
                        Exportar em PDF
                        <i class="far fa-file-pdf"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@stop

@section('adminlte_js')
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/filestyle/bootstrap-filestyle.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/dataTableBr.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<script>
    $('#data_inicio').inputmask('99/99/9999');
    $('#data_fim').inputmask('99/99/9999');
</script>
@stack('js')
@yield('js')
@stop