@extends('adminlte::page')
@section('title', 'Importar')
@section('content_header')
<h1>Importação de Servidores</h1>

<ol class="breadcrumb">
    <li>
    <a href="{{ route('home2') }}">{{ session('company')['nome_fantasia'] ?? 'SisRec' }}</a>
    </li>
    <li>
        <a href="{{ route('importar-servidores.index') }}">Importação de Servidores</a>
    </li>
</ol>

@stop

@section('content')
<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title"> Importar Servidores </h3>
    </div>

    <div class="box-body">

        <div class="row">

            {!! Form::open(['route' => 'importar-servidores.store', 'class' => '', 'id' => 'formServidores', 'enctype' =>
            'multipart/form-data',]) !!}

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="servidores">Enviar arquivo &nbsp;</label><small class="label label-success">*Somente
                        arquivo no formato .xls</small>
                    <input class="filestyle" type="file" name="servidores" id="servidores">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <button style="margin-top: 25px" id="importarServidores" type="button" class="btn btn-success">
                        Importar servidores
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('includes.alerts')
            </div>
            <div class="col-sm-12">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45"
                        aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        <span class="sr-only">45% Complete</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Servidores Importados</h3>
    </div>
    <div class="box-body">
        <table id="table-servant" class="table table-bordered table-striped">
            <thead>
                <th>Registro</th>
                <th>Matricula</th>
                <th>Nome</th>
                <th>Cpf</th>
            </thead>
            
            <tfoot>
                <th>Registro</th>
                <th>Matricula</th>
                <th>Nome</th>
                <th>Cpf</th>
            </tfoot>
        </table>
    </div>
</div>

<!-- <div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title"> Importar Dependentes </h3>
    </div>

    <div class="box-body">
        <div class="row">

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="dependentes">Enviar arquivo &nbsp;</label><small class="label label-success">*Somente
                        arquivo no formato .xls</small>
                    <input class="filestyle" type="file" accept="application/vnd.ms-excel" name="dependentes" id="dependentes">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <button style="margin-top: 25px" id="importarDependentes" type="button" class="btn btn-success">
                        Importar dependentes
                    </button>
                </div>
            </div>

        </div>
    </div>

</div> -->
@stop

@section('adminlte_js')
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/filestyle/bootstrap-filestyle.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/dataTableBr.js') }}"></script>
<script>

    $(".progress").hide();
    $(":file").filestyle({
        text: "Selecione arquivo",
        btnClass: "btn-primary"
    });

    $("#importarServidores, #importarDependentes").hide();

    $("#servidores").change(function () {
        $("#importarServidores").show();
    });

    $("#dependentes").change(function () {
        $("#importarDependentes").show();
    });

    $("#importarServidores").click(function (e) {
        e.preventDefault();
        $(".progress").show();

        $("#formServidores").submit();

    });

    initialiseTableGetServant("{!! url('get-servants') !!}");

</script>
@stack('js')
@yield('js')
@stop