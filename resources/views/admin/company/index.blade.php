@extends('adminlte::page')

@section('title', 'Orgãos/Entidades')

@section('content_header')
<h1>Orgãos / Entidades</h1>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Admin</a>
    </li>
    <li>
        <a href="{{ route('entidades.index') }}">Orgãos/Entidades</a>
    </li>
</ol>
@stop

@section('content')
<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">Listagem de Orgãos / Entidades</h3>
        <br>
        <br>
        <a href="{{ route('entidades.create') }}" class="button-link">
            <button type="button" class="btn btn-info">
                <i class="fa fa-plus"></i>
                Novo
            </button>
        </a>
    </div>

    <div class="box-body with-border">
        @include('includes.alerts')
        <table class="list-table table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Cidade</th>
                    <th>Razão Social</th>
                    <th>CNPJ</th>
                    <th>Nome Fantasia</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                <tr>
                    <td>{{ $company->address->cidade }}</td>
                    <td>{{ $company->razao_social }}</td>
                    <td>{{ $company->cnpj }}</td>
                    <td>{{ $company->nome_fantasia }}</td>
                    <td>
                        <a href="{{ route('entidades.show', $company->razao_social) }}">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom"
                                title="Visualizar {{$company->razao_social}}">
                                <i class="fas fa-eye"></i>
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Cidade</th>
                    <th>Razão Social</th>
                    <th>CNPJ</th>
                    <th>Nome Fantasia</th>
                    <th>Ação</th>
                </tr>
            </tfoot>
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