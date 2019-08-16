@extends('adminlte::page')
@section('title', 'Parciais')
@section('content_header')
<h1>Parciais</h1>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home2') }}">{{ session('company')['nome_fantasia'] ?? 'SisRec' }}</a>
    </li>
    <li>
        <a href="{{ route('relatorios.parciais') }}">Parciais</a>
    </li>
</ol>

@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Servidores Parciais</h3>
        <br>
        <br>
    </div>
    <div class="box-body">

        <div class="row">
            <div class="col-sm-12">
                <table class="list-table table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Cpf</th>
                            <th>Rg</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($servants as $servant)
                        <tr>
                            <td>{{$servant->nome}}</td>
                            <td>{{$servant->cpf}}</td>
                            <td>{{$servant->numero_rg}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nome</th>
                            <th>Cpf</th>
                            <th>Rg</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="row">
            <div class="col-sm-4">
                <a target="_blank" href="{{ route('relatorios.parciais.pdf') }}">
                    <button class="btn btn-primary" type="button">
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
<script>

</script>
@stack('js')
@yield('js')
@stop