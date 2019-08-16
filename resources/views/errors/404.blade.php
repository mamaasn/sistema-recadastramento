@extends('adminlte::page')
@section('title', 'Página não encontrada')
@section('content_header')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home2') }}">{{ session('company')['nome_fantasia'] ?? 'SisRec' }}</a>
    </li>
    <li>
        <a href="{{ route('404') }}">Página não encontrada</a>
    </li>
</ol>

@stop

@section('content')
<div class="error-page">
    <h2 class="headline text-yellow">404</h2>

    <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> Oops! A página que você procura não foi encontrada.</h3>

        <a href="{{route('home2')}}">
            <button type="button" class="btn btn-default">
                Voltar para Home
            </button>
        </a>
    </div>
    <!-- /.error-content -->
</div>
@stop