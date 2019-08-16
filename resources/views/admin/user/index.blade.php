@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
<h1>Usuários</h1>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Admin</a>
    </li>
    <li>
        <a href="{{ route('usuarios.index') }}">Usuários</a>
    </li>
</ol>
@stop

@section('content')
<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">Listagem de Usuários</h3>
        <br>
        <br>
        <a href="{{ route('usuarios.create') }}" class="button-link">
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
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('usuarios.show', $user->email) }}">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Visualizar {{$user->name}}">
                                <i class="fas fa-eye"></i>
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
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