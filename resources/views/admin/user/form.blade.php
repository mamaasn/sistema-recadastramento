@extends('adminlte::page')

@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/pickers/css/bootstrap-datepicker.min.css')}} ">
@stack('css')
@yield('css')
@stop


@section('content_header')
<h1>Usuários</h1>
<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Admin</a>
    </li>
    <li>
        <a href="{{ route('entidades.index') }}">Orgãos/Entidades</a>
    </li>
    <li>
        <a href="{{ route('usuarios.create') }}">{{$titleForm}}</a>
    </li>
</ol>
@stop

@section('content')
@if(isset($user))
{!! Form::model($user, ['route' => ['usuarios.update', $user->email], 'class' => '', 'method' => 'PUT'])
!!}
@else
{!! Form::open(['route' => 'usuarios.store', 'class' => '']) !!}
@endif
<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">{{ $titleForm }}</h3>
    </div>

    <div class="box-body">
        @include('includes.alerts')
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-address-card"></i> Dados Cadastrais</div>
            <div class="panel-body">
                
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-address-card"></i>
                                </div>
                                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
                            </div>
                        </div>
                    </div>                    
                
                <div class="col-sm-4">
                        <div class="form-group">
                            <label for="usuario">Email</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                {!! Form::text('email', null, ['class' => 'form-control', 'id' =>
                                'email']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                {!! Form::text('password', null, ['class' => 'form-control', 'id' =>
                                'password']) !!}
                            </div>
                        </div>
                </div>
            </div>
        </div>
        

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">
            Salvar
        </button>
        <a href="{{ route('usuarios.index') }}">
            <button type="button" class="btn btn-default">
                Voltar
            </button>
        </a>
    </div>

</div>
{!! Form::close() !!}
@stop

@section('adminlte_js')
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
@stack('js')
@yield('js')
@stop