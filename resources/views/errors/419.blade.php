@extends('adminlte::page')
@section('title', 'Sessão expirada')
@section('content_header')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home2') }}">{{ session('company')['nome_fantasia'] ?? 'SisRec' }}</a>
    </li>
    <li>
        <a href="{{ route('419') }}">Sessão expirada</a>
    </li>
</ol>

@stop

@section('content')
<div class="error-page">
    <h2 class="headline text-purple">419</h2>

    <div class="error-content">
        <h3><i class="fa fa-warning text-purple"></i> Oops! Sua sessão foi expirada. Por favor, efetue o login novamente.</h3>

        <a href="{{route('login')}}">
            <button type="button" class="btn btn-default">
                Login
            </button>
        </a>
    </div>
    <!-- /.error-content -->
</div>
@stop