@extends('adminlte::page')
@section('title', 'Erro interno')
@section('content_header')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home2') }}">{{ session('company')['nome_fantasia'] ?? 'SisRec' }}</a>
    </li>
    <li>
        <a href="{{ route('500') }}">Erro interno</a>
    </li>
</ol>

@stop

@section('content')
<div class="error-page">
    <h2 class="headline text-red">500</h2>

    <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> Oops! Erro interno do servidor, por favor, contate um administrador.</h3>

        <a href="{{route('home2')}}">
            <button type="button" class="btn btn-default">
                Voltar para Home
            </button>
        </a>
    </div>
    <!-- /.error-content -->
</div>
@stop