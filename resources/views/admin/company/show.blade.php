@extends('adminlte::page')

@section('title', 'Dados Orgãos/Entidade')

@section('content_header')
<h1>{{$company->razao_social}}</h1>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Admin</a>
    </li>
    <li>
        <a href="{{ route('entidades.index') }}">Orgãos/Entidades</a>
    </li>
    <li>
        <a href="{{ route('entidades.show', $company->razao_social) }}">{{$company->razao_social}}</a>
    </li>
</ol>
@stop

@section('content')
<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">Dados de: <b>{{ $company->razao_social }}</b></h3>
    </div>

    <div class="box-body with-border">
        @include('includes.alerts')

        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-address-card"></i> Dados Cadastrais</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        CNPJ: <b>{{$company->cnpj ?? 'Não informado'}}</b>
                    </div>
                    <div class="col-sm-4">
                        Razão Social: <b>{{$company->razao_social ?? 'Não informado'}}</b>
                    </div>
                    <div class="col-sm-4">
                        Nome Fantasia: <b>{{$company->nome_fantasia ?? 'Não informado'}}</b>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-map-marked-alt"></i> Endereço</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        CEP: <b>{{$company->address->cep ?? 'Não informado'}}</b>
                    </div>
                    <div class="col-sm-4">
                        Logradouro: <b>{{$company->address->logradouro ?? 'Não informado'}}</b>
                    </div>
                    <div class="col-sm-4">
                        Número: <b>{{$company->address->numero ?? 'Não informado'}}</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Bairro: <b>{{$company->address->bairro ?? 'Não informado'}}</b>
                    </div>
                    <div class="col-sm-4">
                        Cidade: <b>{{$company->address->cidade ?? 'Não informado'}}</b>
                    </div>
                    <div class="col-sm-4">
                        Estado: <b>{{$company->address->estado ?? 'Não informado'}}</b>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-phone-square"></i> Contato</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        Telefone: <b>{{$company->telefone ?? 'Não informado'}}</b>
                    </div>
                    <div class="col-sm-4">
                        Telefone 2: <b>{{$company->telefone2 ?? 'Não informado'}}</b>
                    </div>
                    <div class="col-sm-4">
                        E-mail: <b>{{$company->email ?? 'Não informado'}}</b>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-database"></i> Banco de Dados</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        Sub-domínio: <b>{{$company->sub_domain ?? 'Não informado'}}</b>
                    </div>
                    <div class="col-sm-4">
                        Hostname: <b>{{$company->bd_hostname ?? 'Não informado'}}</b>
                    </div>
                    <div class="col-sm-4">
                        Nome do Banco de Dados: <b>{{$company->bd_database ?? 'Não informado'}}</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Usuário do Banco de Dados: <b>{{$company->bd_username ?? 'Não informado'}}</b>
                    </div>
                    <div class="col-sm-4">
                        Senha do Banco de Dados: <b>{{$company->bd_password ?? 'Não informado'}}</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <a href="{{ route('entidades.edit', $company->razao_social) }}">
            <button type="button" class="btn btn-primary">
                Editar
            </button>
        </a>
        <button type="button" class="btn btn-danger">
            Deletar
        </button>
        <a href="{{ route('entidades.index') }}">
            <button type="button" class="btn btn-default">
                Voltar
            </button>
        </a>
    </div>



</div>

@stop

@section('adminlte_js')
@stack('js')
@yield('js')
@stop