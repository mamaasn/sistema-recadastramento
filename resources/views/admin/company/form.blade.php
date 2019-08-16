@extends('adminlte::page')

@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/pickers/css/bootstrap-datepicker.min.css')}} ">
@stack('css')
@yield('css')
@stop


@section('content_header')
<h1>Orgãos / Entidades</h1>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Admin</a>
    </li>
    <li>
        <a href="{{ route('entidades.index') }}">Orgãos/Entidades</a>
    </li>
    <li>
        <a href="{{ route('entidades.create') }}">{{$titleForm}}</a>
    </li>
</ol>
@stop

@section('content')
@if(isset($company))
    {!! Form::model($company, ['route' => ['entidades.update', $company->address->cep], 'class' => '', 'method' => 'PUT']) !!}
@else
    {!! Form::open(['route' => 'entidades.store', 'class' => '']) !!}
@endif
<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">{{ $titleForm }}</h3>
    </div>

    <div class="box-body with-border">
        @include('includes.alerts')
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-address-card"></i> Dados Cadastrais</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-address-card"></i>
                                </div>
                                {!! Form::text('cnpj', null, ['class' => 'form-control', 'id' => 'cnpj', isset($company) ? 'disabled' : '']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="razao_social">Razão Social</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-address-card"></i>
                                </div>
                                {!! Form::text('razao_social', null, ['class' => 'form-control', 'id' =>
                                'razao_social', isset($company) ? 'disabled' : '']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nome_fantasia">Nome Fantasia</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-address-card"></i>
                                </div>
                                {!! Form::text('nome_fantasia', null, ['class' => 'form-control', 'id' =>
                                'nome_fantasia']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-map-marked-alt"></i> Endereço</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cep">CEP <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="Digite o CEP *Somente números para pesquisar"></i></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-map-marked-alt"></i>
                                </div>
                                {!! Form::text('cep', ( isset($company) ? $company->address->cep : null), ['class' => 'form-control', 'id' => 'cep']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="logradouro">Logradouro</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-road"></i>
                                </div>
                                {!! Form::text('logradouro', ( isset($company) ? $company->address->logradouro : null), ['class' => 'form-control', 'id' =>
                                'logradouro']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="numero">Número</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-map-marked-alt"></i>
                                </div>
                                {!! Form::text('numero', ( isset($company) ? $company->address->numero : null), ['class' => 'form-control', 'id' =>
                                'numero']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-map-marked-alt"></i>
                                </div>
                                {!! Form::text('bairro', ( isset($company) ? $company->address->bairro : null), ['class' => 'form-control', 'id' => 'bairro']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-city"></i>
                                </div>
                                {!! Form::text('cidade', ( isset($company) ? $company->address->cidade : null), ['class' => 'form-control', 'id' =>
                                'cidade']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-flag"></i>
                                </div>
                                {!! Form::text('estado', ( isset($company) ? $company->address->estado : null), ['class' => 'form-control', 'id' =>
                                'estado']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-phone-square"></i> Contato</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                {!! Form::text('telefone', null, ['class' => 'form-control', 'id' => 'telefone']) !!}

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="telefone2">Telefone 2</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                {!! Form::text('telefone2', null, ['class' => 'form-control', 'id' =>
                                'telefone2']) !!}
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
                                {!! Form::email('email', null, ['class' => 'form-control', 'id' =>
                                'email']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-database"></i> Banco de Dados</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="sub_domain">Sub-domínio</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-sitemap"></i>
                                </div>
                                {!! Form::text('sub_domain', null, ['class' => 'form-control', 'id' => 'sub_domain', 'required', isset($company) ? 'disabled' : ''])
                                !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="bd_hostname">Hostname</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </div>
                                {!! Form::text('bd_hostname', null, ['class' => 'form-control', 'id' =>
                                'bd_hostname', 'required', isset($company) ? 'disabled' : '']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="bd_database">Nome do Banco de Dados</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </div>
                                {!! Form::text('bd_database', null, ['class' => 'form-control', 'id' =>
                                'bd_database', 'required', isset($company) ? 'disabled' : '']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="bd_username">Usuário do Banco de Dados</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                {!! Form::text('bd_username', null, ['class' => 'form-control', 'id' =>
                                'bd_username', 'required', isset($company) ? 'disabled' : '']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="bd_password">Senha do Banco de Dados</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </div>
                                {!! Form::text('bd_password', null, ['class' => 'form-control', 'id' =>
                                'bd_password', isset($company) ? 'disabled' : '']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">
            Salvar
        </button>
        <a href="{{ route('entidades.index') }}">
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
<script>
    $('#cnpj').inputmask('99.999.999/9999-99')
    $('#telefone').inputmask('(99) 9999-9999')
    $('#telefone2').inputmask('(99) 9999-9999')

    $('[data-toggle="tooltip"]').tooltip();

    $('#cep').keypress(function (e) {

        if (e.which == 13) {
            if ($('#cep').val() != '' && $('#cep').val().length === 8) {
                e.preventDefault();
                var cep = $('#cep').val();
                var url = 'https://api.postmon.com.br/v1/cep/' + cep;
                $.get(url, function (resultado) {
                    $('#logradouro').val(resultado.logradouro);
                    $('#bairro').val(resultado.bairro);
                    $('#cidade').val(resultado.cidade);
                    $('#estado').val(resultado.estado);
                });
            }
            e.preventDefault();
        }
        
    });

</script>
@stack('js')
@yield('js')
@stop