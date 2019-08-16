@extends('adminlte::page')
@section('title', 'Usuários')
@section('content_header')
<h1>Usuários</h1>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home2') }}">{{ session('company')['nome_fantasia'] ?? 'SisRec' }}</a>
    </li>
    <li>
        <a href="{{ route('users.acesso', $user->id) }}">{{ $user->name }}</a>
    </li>
    <li>
        <a>Niveis de Acesso</a>
    </li>
</ol>

@stop

@section('content')
{!! Form::open(['route' => 'users.acesso-register', 'class' => '', 'id' => 'form']) !!}
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $user->name }}</h3>
        <br>
        <br>
    </div>
    <div class="box-body">
        
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Selecione a função deste usuário</label>
                    {!! Form::select('role', $roles, null, ['class' => 'form-control']) !!}
                    {!! Form::hidden('user_id', $user->id) !!}
                </div>
            </div>
        </div>
        

    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</div>
{!! Form::close() !!}
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