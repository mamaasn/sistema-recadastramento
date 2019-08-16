@extends('adminlte::page') 
@section('title', 'Recadastramento') 
@section('content_header')
<h1>Recadastramento</h1>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home2') }}">{{ session('company')['nome_fantasia'] ?? 'SisRec' }}</a>
    </li>
    <li>
        <a href="{{ route('recadastramento.index') }}">Listagem de Servidores</a>
    </li>
</ol>


@stop 
@section('body_class', 'skin-' . config('adminlte.skin', 'blue') . ' sidebar-mini ' . (config('adminlte.layout') ?
[ 'boxed' => 'layout-boxed', 'fixed' => 'fixed', 'top-nav' => 'layout-top-nav' ][config('adminlte.layout')] : '') . (config('adminlte.collapse_sidebar')
? ' sidebar-collapse ' : '')) 
@section('content')
<div class="animated bounce box box-primary">


    <div class="box-header with-border">
        <h3 class="box-title"> Pesquisa de Servidores </h3>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-sm-6">
                <div id="validation-servant" class="form-group has-feedback">
                    {!! Form::text('searchServant', null, ['class' => 'form-control', 'id' => 'searchServant', 'minlenght' => '3', 'placeholder'
                    => 'Digite o nome do Servidor para pesquisar']) !!}
                    <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block">
                        <strong id="error-servant"></strong>
                    </span>
                </div>
            </div>

            <div class="col-sm-4">
                <button type="button" id="btnSearch" class="btn btn-info">
                    <i class="fa fa-search"></i>
                    Selecionar
                </button>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-12">
    @include('includes.alerts')
            </div>
        </div>
    </div>

</div>


<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">Resultados da Pesquisa</h3>
        <br>
        <br>

    </div>

    <div class="box-body with-border">
        <table id="table-servant" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Registro</th>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Registro</th>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
        <div class="col-sm-12">
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"
                    style="width: 100%">
                    <span class="sr-only">45% Complete</span>
                </div>
            </div>
        </div>
    </div>

</div>



@stop 
@section('adminlte_js')
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/dataTableBr.js') }}"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(".progress").hide();
    $(document).bind("ajaxSend", function () {
        $(".progress").show();
    }).bind("ajaxComplete", function () {
        $(".progress").hide();
    });

    $('[data-toggle="tooltip"]').tooltip();


    function getUrl() {
        var $name = $('#searchServant').val();

        if ($name === '') {
            $('#validation-servant').addClass('has-error');
            $('#error-servant').html('Campo vazio!');
            return false;
        }
        if ($name.length < 3) {
            $('#validation-servant').addClass('has-error');
            $('#error-servant').html('Digite pelo menos 3 caracteres para pesquisar!');
            return false;
        }
        var $url = '/search-servant/' + $name;
        return $url;
    }

    $('#btnSearch').click(function () {
        if (!getUrl()) {

        } else {
            $('#validation-servant').removeClass('has-error');
            $('#error-servant').html('');
            initialiseTableServant(getUrl());
        }
    });

    $('#searchServant').keyup(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            if (!getUrl()) {

            } else {
                $('#validation-servant').removeClass('has-error');
                $('#error-servant').html('');
                initialiseTableServant(getUrl());
            }
        }
        else {
            let availableTags = [];
            $.ajax({
                type: 'GET',
                url: '{!! url("autocomplete") !!}' + '/' + this.value,
                success: function (response) {
                   
                    for (key in response) {
                        availableTags[key] = response[key].nome
                    }
                    $( "#searchServant" ).autocomplete({
                        source: availableTags
                    });
                },
         
            });
        }
    });


</script>
@stack('js') @yield('js') 
@stop