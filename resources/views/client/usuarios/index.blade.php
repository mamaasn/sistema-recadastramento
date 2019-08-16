@extends('adminlte::page')
@section('title', 'Usuários')
@section('content_header')
<h1>Usuários</h1>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home2') }}">{{ session('company')['nome_fantasia'] ?? 'SisRec' }}</a>
    </li>
    <li>
        <a href="{{ route('users.index') }}">Usuários</a>
    </li>
</ol>

@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Listagem dos usuários</h3>
        <br>
        <br>
        <a href="{{ route('users.create') }}" class="button-link">
            <button type="button" class="btn btn-info">
                Novo
            </button>
        </a>
    </div>
    <div class="box-body">
        <table class="list-table table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Cpf</th>
                    <th>Niveis de Acesso</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->cpf}}</td>
                    <td><a href="{{ route('users.acesso', $user->id) }}">Gerenciar Nivéis de Acesso</a></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Cpf</th>
                    <th>Niveis de Acesso</th>
                </tr>
            </tfoot>
        </table>
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