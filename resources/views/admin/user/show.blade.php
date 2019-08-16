@extends('adminlte::page')

@section('title', 'Dados Usuário')

@section('content_header')
<h1>{{$user->name}}</h1>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Admin</a>
    </li>
    <li>
        <a href="{{ route('usuarios.index') }}">Usuários</a>
    </li>
    <li>
        <a href="{{ route('usuarios.show', $user->name) }}">{{$user->name}}</a>
    </li>
</ol>
@stop

@section('content')
<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">Dados de: <b>{{ $user->name }}</b></h3>
    </div>

    <div class="box-body with-border">
        @include('includes.alerts')

        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-address-card"></i> Dados Cadastrais</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        Nome: <b>{{$user->name}}</b>
                    </div>
                    <div class="col-sm-4">
                        Email: <b>{{$user->email}}</b>
                    </div>                    
                </div>
            </div>
        </div>
</div>
        
    <div class="box-footer">
        <a href="{{ route('usuarios.edit', $user->email) }}">
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