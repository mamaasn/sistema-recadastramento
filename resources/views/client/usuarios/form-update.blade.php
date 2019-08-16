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
        <a href="{{ route('home2') }}">{{ session('company')['nome_fantasia'] ?? 'SisRec' }}</a>
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
{!! Form::model($user, ['route' => ['users.update', $user->email], 'class' => '', 'method' => 'PUT'])
!!}
@else
{!! Form::open(['route' => 'users.store', 'class' => '']) !!}
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

                <!-- <div class="col-sm-4">
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
                </div> -->
                <div class="col-sm-4">
                    <div class="form-group cpf_class">
                        <label for="cpf">CPF</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-address-card"></i>
                            </div>
                            {!! Form::text('cpf', null, ['class' => 'form-control', 'id' => 'cpf']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="rg">RG</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-address-card"></i>
                            </div>
                            {!! Form::text('rg', null, ['class' => 'form-control', 'id' => 'rg', 'maxlength' => '20'])
                            !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-phone"></i> Contato</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="telefone">Telefone Fixo</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                {!! Form::text('telefone', null, ['class' => 'form-control',
                                'id' =>
                                'telefone', 'maxlength' => '15']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="celular">Telefone Celular</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-mobile-alt"></i>
                                </div>
                                {!! Form::text('celular', null, ['class' => 'form-control',
                                'id' =>
                                'celular','maxlength' => '40']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'maxlength'
                                => '30', 'disabled']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="box-footer">
            <button type="submit" class="btn btn-success">
                Salvar
            </button>
            <a href="{{ route('home2') }}">
                <button type="button" class="btn btn-default">
                    Voltar
                </button>
            </a>
            <button data-toggle="modal" data-target="#modal-alterar-senha" type="button" class="btn btn-primary">
                Alterar Senha
            </button>

        </div>

    </div>
    {!! Form::close() !!}
    <div id="modal-alterar-senha" tabindex="-1" role="dialog" aria-labelledby="myModalLabelLarge" aria-hidden="true"
        class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Alterar Senha</h4>
                </div>
                <div class="modal-body">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password">Senha atual</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="new_password">Nova atual</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                {!! Form::password('new_password', ['class' => 'form-control', 'id' => 'new_password'])
                                !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                    <button type="button" class="btn btn-success btn-alterar-senha">Salvar</button>
                </div>
            </div>
        </div>
    </div>
    @stop

    @section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

    <script>
        $('#cpf').inputmask('999.999.999-99');
        $('#rg').inputmask('##.###.###-#');
        $('#telefone').inputmask('(99) 9999-9999');
        $('#celular').inputmask('(99) 99999-9999');

        $('.btn-alterar-senha').click(function () {
            var dataForm = new FormData();

            dataForm.append('password', $('#password').val());
            dataForm.append('new_password', $('#new_password').val());

            $.ajax({
                type: 'POST',
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                },
                url: "{!! route('alterar-senha') !!}",
                data: dataForm,
                success: function (response) {
                    alert(response);
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });

        });

    </script>



    @stack('js')
    @yield('js')
    @stop