@extends('adminlte::page')

@section('title', 'Agendamento')

@section('content_header')
<h1>Agendamento</h1>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">{{ session('company')['nome_fantasia'] ?? 'SisRec' }}</a>
    </li>
    <li>
        <a href="{{ route('agendamento.index') }}">Agendamento</a>
    </li>
</ol>
@stop

@section('content')

<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">Listagem de Horários Agendados</h3>
        <br>
        <br>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-agendamento">
                Novo Agendamento
            </button>
    </div>
    
    <div class="box-body with-border">
        @include('includes.alerts')
        <table id="" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Horário</th>
                    <th>Data</th>
                    <th>Protocolo</th>
                </tr>
            </thead>


        </table>
    </div>

</div>

@stop

@section('adminlte_js')
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/dataTableBr.js') }}"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stack('js')
@yield('js')
@stop

@include('client.agendamento.modal-agendamento')
