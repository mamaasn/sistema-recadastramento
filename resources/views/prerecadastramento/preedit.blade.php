@extends('adminlte::page')
@section('title', 'Recadastramento')
@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/pickers/css/bootstrap-datepicker.min.css')}} ">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/mdb/css/switch.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/jquery-fileupload/css/jquery.fileupload.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/flat/blue.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/custom.css')}} ">
@stack('css') @yield('css')
@stop
@section('body_class', 'skin-' . config('adminlte.skin', 'blue') . ' sidebar-mini ' . (config('adminlte.layout') ? [
'boxed' => 'layout-boxed',
'fixed' => 'fixed',
'top-nav' => 'layout-top-nav'
][config('adminlte.layout')] : '') . (config('adminlte.collapse_sidebar') ? ' sidebar-collapse ' : ''))
@section('content_header')

@stop
@section('content')
@if(isset($servant))
{!! Form::model($servant, ['route' => ['preUpdate', $servant->registro], 'id' => 'form', 'enctype' =>
'multipart/form-data', 'method' => 'PUT']) !!}
@else
{!! Form::open(['route' => 'recadastramento.store', 'class' => '', 'id' => 'form']) !!} @endif

<div class="box box-primary">

    <div class="box-header with-border">
        <div class="row">
            <div class="col-sm-6">

                <div class="row">

                    <div class="col-sm-12">
                        <h3 class="box-title">Dados do Servidor: <b>{{ $servant->nome ?? 'Nome do Servidor'}}</b> /
                            Matrícula:
                            <b>{{ $servant->matricula ?? 'Matrícula do Servidor' }}</b>
                        </h3>
                    </div>
                    <br>
                    <br>
                    <div class="col-sm-12">
                        
                        <button type="button" class="btn btn-primary btn-parcial"><i class="fa fa-save"></i>
                            Salvar Parcial
                        </button>
                        
                    </div>

                </div>


            </div>
            
        </div>


    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Dados Pessoais</a></li>
                 

                        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                    </ul>
                    <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
    @include('includes.alerts')
    
    <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-address-card"></i> Dados Cadastrais</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group nome_class has-feedback {{ $errors->has('logradouro') ? 'has-warning' : '' }}">
                        <label for="nome">Nome completo</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-address-card"></i>
                            </div>
                            {!! Form::text('nome', null, ['class' => 'form-control', 'id' => 'nome', 'maxlength' =>
                            '60', 'tabindex' => '1']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="cep">CEP <i class="fa fa-question-circle" data-toggle="tooltip" title=""
                                data-original-title="Digite o CEP *Somente números para pesquisar"></i></label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marked-alt"></i>
                            </div>
                            {!! Form::text('cep', null, ['class' => 'form-control', 'id' => 'cep', 'maxlength' => '8',
                            'tabindex' => '2'])
                            !!}
                            {!! Form::hidden('cidade_codigo_ibge', isset($servant) ? $servant->cidade_codigo_ibge : '', ['id' => 'cidade_codigo_ibge']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="public_place_id">Tipo do Logradouro </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marked-alt"></i>
                            </div>
                            {!! Form::select('public_place_id', $publicPlaces, null, ['class' => 'form-control
                            ', 'id' => 'public_place_id', 'tabindex' => '3']) !!}
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-4">
                    <div class="form-group logradouro_class has-feedback {{ $errors->has('logradouro') ? 'has-warning' : '' }}">
                        <label for="logradouro">Logradouro</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marked-alt"></i>
                            </div>
                            {!! Form::text('logradouro', null, ['class' => 'form-control', 'id' => 'logradouro',
                            'maxlength' => '70', 'tabindex' => '3']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group bairro_class has-feedback {{ $errors->has('bairro') ? 'has-warning' : '' }}">
                        <label for="bairro">Bairro</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marked-alt"></i>
                            </div>
                            {!! Form::text('bairro', null, ['class' => 'form-control', 'id' => 'bairro', 'maxlength' =>
                            '72', 'tabindex' => '4']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group numero_class has-feedback {{ $errors->has('numero') ? 'has-warning' : '' }}">
                        <label for="numero">Número</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marked-alt"></i>
                            </div>
                            {!! Form::text('numero', null, ['class' => 'form-control', 'id' => 'numero', 'maxlength' =>
                            '10', 'tabindex' => '5']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group cidade_class has-feedback {{ $errors->has('cidade') ? 'has-warning' : '' }}">
                        <label for="cidade">Cidade</label><small class="pull-right">Código IBGE: <b id="codigo-ibge">{{ $servant->cidade_codigo_ibge ?? '' }}</b></small>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marked-alt"></i>
                            </div>
                            {!! Form::text('cidade', null, ['class' => 'form-control', 'id' => 'cidade', 'maxlength' =>
                            '30', 'tabindex' => '6']) !!}
                        </div>

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group uf_endereco_class has-feedback {{ $errors->has('uf_endereco') ? 'has-warning' : '' }}">
                        <label for="uf_endereco">UF</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marked-alt"></i>
                            </div>
                            {!! Form::text('uf_endereco', null, ['class' => 'form-control', 'id' => 'uf_endereco',
                            'maxlength' => '2', 'tabindex' => '7']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="complemento">Complemento</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marked-alt"></i>
                            </div>
                            {!! Form::text('complemento', null, ['class' => 'form-control', 'id' => 'complemento',
                            'maxlength' => '20', 'tabindex' => '8']) !!}
                        </div>
                    </div>
                </div>


                <div class="col-sm-4">
                    <div class="form-group data_nascimento_class has-feedback {{ $errors->has('data_nascimento') ? 'has-warning' : '' }}">
                        <label for="data_nascimento">Data Nascimento</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            {!! Form::text('data_nascimento', null, ['class' => 'form-control', 'id' =>
                            'data_nascimento', 'maxlength' => '10', 'tabindex' => '9']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group cidade_nascimento_class has-feedback {{ $errors->has('cidade_nascimento') ? 'has-warning' : '' }}">
                        <label for="cidade_nascimento">Cidade de Nascimento</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            {!! Form::text('cidade_nascimento', null, ['class' => 'form-control', 'id' =>
                            'cidade_nascimento', 'maxlength' => '30', 'tabindex' => '10']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group uf_nascimento_class has-feedback {{ $errors->has('uf_nascimento') ? 'has-warning' : '' }}">
                        <label for="uf_nascimento">UF de Nascimento</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            {!! Form::text('uf_nascimento', null, ['class' => 'form-control', 'id' => 'uf_nascimento',
                            'maxlength' => '2', 'tabindex' => '11']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group registro_nascimento_class has-feedback {{ $errors->has('registro_nascimento') ? 'has-warning' : '' }}">
                        <label for="registro_nascimento">Registro Único de Cartório</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            {!! Form::text('registro_nascimento', null, ['class' => 'form-control', 'id' =>
                            'registro_nascimento', 'maxlength' => '15', 'tabindex' => '12']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="martial_status_id">Estado Civil</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            {!! Form::select('martial_status_id', $maritalStatus, null, ['class' => 'form-control
                            ', 'id' => 'martial_status_id', 'tabindex' => '13']) !!}
                        </div>

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="nationality_id">Nacionalidade</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            {!! Form::select('nationality_id', $nationalities, null, ['class' => 'form-control
                            ', 'id' => 'nationality_id', 'tabindex' => '14'])
                            !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="ano_chegada">Ano da Chegada</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            {!! Form::text('ano_chegada', null, ['class' => 'form-control', 'id' => 'ano_chegada',
                            'maxlength' => '4', 'tabindex' => '15']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            {!! Form::select('sexo', ['F' => 'Feminino', 'M' => 'Masculino'], null, ['class' =>
                            'form-control', 'id' => 'sexo', 'tabindex' => '16'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="instruction_id">Grau de Instrução</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            {!! Form::select('instruction_id', $instructions, null, ['class' => 'form-control
                            ', 'id' => 'instruction_id', 'tabindex' => '17']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="telefone_fixo">Telefone Fixo</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>
                            {!! Form::text('telefone_fixo', null, ['class' => 'form-control', 'id' => 'telefone_fixo',
                            'maxlength' => '15', 'tabindex' => '18']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group fone_celular_class has-feedback {{ $errors->has('fone_celular') ? 'has-warning' : '' }}">
                        <label for="fone_celular">Telefone Celular</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-mobile-alt"></i>
                            </div>
                            {!! Form::text('fone_celular', null, ['class' => 'form-control', 'id' => 'fone_celular',
                            'maxlength' => '40', 'tabindex' => '19']) !!}
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
                            {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'tabindex' => '20']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-address-card"></i> Parentesco</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nome_mae">Nome da Mãe</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-address-card"></i>
                            </div>
                            {!! Form::text('nome_mae', null, ['class' => 'form-control', 'id' => 'nome_mae',
                            'maxlength' => '60', 'tabindex' => '21']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="cpf_mae">CPF da Mãe</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-address-card"></i>
                            </div>
                            {!! Form::text('cpf_mae', null, ['class' => 'form-control', 'id' => 'cpf_mae', 'tabindex' => '22']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nome_pai">Nome do Pai</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-address-card"></i>
                            </div>
                            {!! Form::text('nome_pai', null, ['class' => 'form-control', 'id' => 'nome_pai',
                            'maxlength' => '60', 'tabindex' => '23']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="cpf_pai">CPF do Pai</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-address-card"></i>
                            </div>
                            {!! Form::text('cpf_pai', null, ['class' => 'form-control', 'id' => 'cpf_pai', 'tabindex' => '24']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-address-card"></i> Documentos</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group cpf_class has-feedback {{ $errors->has('cpf') ? 'has-warning' : '' }}">
                        <label for="cpf">CPF</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-address-card"></i>
                            </div>
                            {!! Form::text('cpf', null, ['class' => 'form-control', 'id' => 'cpf', 'tabindex' => '25']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group numero_rg_class has-feedback {{ $errors->has('numero_rg') ? 'has-warning' : '' }}">
                        <label for="numero_rg">RG</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-address-card"></i>
                            </div>
                            {!! Form::text('numero_rg', null, ['class' => 'form-control', 'id' => 'numero_rg',
                            'maxlength'
                            => '15', 'tabindex' => '26']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group data_emissao_rg_class has-feedback {{ $errors->has('data_emissao_rg') ? 'has-warning' : '' }}">
                        <label for="data_emissao_rg">Data Emissão do RG</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            {!! Form::text('data_emissao_rg', null, ['class' => 'form-control', 'id' =>
                            'data_emissao_rg', 'maxlength'
                            => '10', 'tabindex' => '27']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group orgao_rg_class has-feedback {{ $errors->has('orgao_rg') ? 'has-warning' : '' }}">
                        <label for="orgao_rg">Orgão Expedidor/Emissor do RG (Ex: SSP)</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marked-alt"></i>
                            </div>
                            {!! Form::text('orgao_rg', null, ['class' => 'form-control', 'id' => 'orgao_rg',
                            'maxlength'
                            => '8', 'tabindex' => '28']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group uf_rg_class has-feedback {{ $errors->has('uf_rg') ? 'has-warning' : '' }}">
                        <label for="uf_rg">UF do RG</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marked-alt"></i>
                            </div>
                            {!! Form::text('uf_rg', null, ['class' => 'form-control', 'id' => 'uf_rg', 'maxlength'
                            => '2', 'tabindex' => '29']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="numero_cnh">Número da CNH</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marked-alt"></i>
                            </div>
                            {!! Form::text('numero_cnh', null, ['class' => 'form-control', 'id' => 'numero_cnh',
                            'maxlength'
                            => '14', 'tabindex' => '30']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="uf_cnh">UF da CNH</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marked-alt"></i>
                            </div>
                            {!! Form::text('uf_cnh', null, ['class' => 'form-control', 'id' => 'uf_cnh', 'maxlength'
                            => '2', 'tabindex' => '31']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="data_expedicao_cnh">Data da Expedição da CNH</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marked-alt"></i>
                            </div>
                            {!! Form::text('data_expedicao_cnh', null, ['class' => 'form-control', 'id' =>
                            'data_expedicao_cnh', 'maxlength'
                            => '10', 'tabindex' => '32']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="data_validade_cnh">Data de Validade da CNH</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marked-alt"></i>
                            </div>
                            {!! Form::text('data_validade_cnh', null, ['class' => 'form-control', 'id' =>
                            'data_validade_cnh', 'maxlength'
                            => '10', 'tabindex' => '33']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="categoria_cnh">Categoria da CNH</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marked-alt"></i>
                            </div>
                            {!! Form::text('categoria_cnh', null, ['class' => 'form-control', 'id' => 'categoria_cnh',
                            'maxlength'
                            => '5', 'tabindex' => '34']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group numero_ctps_class has-feedback {{ $errors->has('numero_ctps') ? 'has-warning' : '' }}">
                        <label for="numero_ctps">Número da CTPS</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            {!! Form::text('numero_ctps', null, ['class' => 'form-control', 'id' => 'numero_ctps',
                            'maxlength'
                            => '7', 'tabindex' => '35']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group serie_ctps_class has-feedback {{ $errors->has('serie_ctps') ? 'has-warning' : '' }}">
                        <label for="serie_ctps">Série da CTPS</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            {!! Form::text('serie_ctps', null, ['class' => 'form-control', 'id' => 'serie_ctps',
                            'maxlength'
                            => '5', 'tabindex' => '36']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group uf_ctps_class has-feedback {{ $errors->has('uf_ctps') ? 'has-warning' : '' }}">
                        <label for="uf_ctps">UF da CTPS</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            {!! Form::text('uf_ctps', null, ['class' => 'form-control', 'id' => 'uf_ctps', 'maxlength'
                            => '2', 'tabindex' => '37']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group data_emissao_ctps_class has-feedback {{ $errors->has('data_emissao_ctps') ? 'has-warning' : '' }}">
                        <label for="data_emissao_ctps">Data de emissão da CTPS</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            {!! Form::text('data_emissao_ctps', null, ['class' => 'form-control', 'id' => 'data_emissao_ctps', 'maxlength' => '10']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="livro">Livro</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            {!! Form::text('livro', null, ['class' => 'form-control', 'id' => 'livro', 'maxlength'
                            => '10', 'tabindex' => '38']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="folha">Folha</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            {!! Form::text('folha', null, ['class' => 'form-control', 'id' => 'folha', 'maxlength'
                            => '10', 'tabindex' => '39']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group numero_titulo_class has-feedback {{ $errors->has('numero_titulo') ? 'has-warning' : '' }}">
                        <label for="numero_titulo">Número do Título Eleitoral</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            {!! Form::text('numero_titulo', null, ['class' => 'form-control', 'id' => 'numero_titulo',
                            'maxlength'
                            => '13', 'tabindex' => '40']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group zona_titulo_class has-feedback {{ $errors->has('zona_titulo') ? 'has-warning' : '' }}">
                        <label for="zona_titulo">Zona Eleitoral</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            {!! Form::text('zona_titulo', null, ['class' => 'form-control', 'id' => 'zona_titulo',
                            'maxlength'
                            => '3', 'tabindex' => '41']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group secao_titulo_class has-feedback {{ $errors->has('secao_titulo') ? 'has-warning' : '' }}">
                        <label for="secao_titulo">Seção</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            {!! Form::text('secao_titulo', null, ['class' => 'form-control', 'id' => 'secao_titulo',
                            'maxlength'
                            => '5', 'tabindex' => '42']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group uf_titulo_class has-feedback {{ $errors->has('uf_titulo') ? 'has-warning' : '' }}">
                        <label for="uf_titulo">UF do Título</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            {!! Form::text('uf_titulo', null, ['class' => 'form-control', 'id' => 'uf_titulo',
                            'maxlength'
                            => '2', 'tabindex' => '43']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group pis_class has-feedback {{ $errors->has('pis') ? 'has-warning' : '' }}">
                        <label for="pis">PIS</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            {!! Form::text('pis', null, ['class' => 'form-control', 'id' => 'pis', 'tabindex' => '44']) !!}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-address-card"></i> Características</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="cor_cabelo">Cor do Cabelo</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            {!! Form::text('cor_cabelo', null, ['class' => 'form-control', 'id' => 'cor_cabelo',
                            'maxlength'
                            => '20', 'tabindex' => '45']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="cor_olhos">Cor dos Olhos</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            {!! Form::text('cor_olhos', null, ['class' => 'form-control', 'id' => 'cor_olhos',
                            'maxlength'
                            => '20', 'tabindex' => '46']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="altura">Altura</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            {!! Form::text('altura', null, ['class' => 'form-control', 'id' => 'altura', 'maxlength'
                            => '10', 'tabindex' => '47']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="peso">Peso</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            {!! Form::text('peso', null, ['class' => 'form-control', 'id' => 'peso', 'maxlength'
                            => '10', 'tabindex' => '48']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="tipo_sanguineo">Tipo Sanguíneo</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            {!! Form::select('tipo_sanguineo', ['A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-',
                            'AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O-'], null, ['class' => 'form-control', 'id'
                            =>
                            'tipo_sanguineo', 'tabindex' => '49'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="doador">É Doador?</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            {!! Form::select('doador', ['N' => 'Não', 'S' => 'Sim'], null, ['class' =>
                            'form-control', 'id' => 'doador', 'tabindex' => '50'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="race_id">Raça</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            {!! Form::select('race_id', $races, null, ['class' => 'form-control
                            ', 'id' => 'race_id', 'tabindex' => '51']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-address-card"></i> Deficiencia</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="necessidades_especiais">Necessidades Especiais</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            {!! Form::select('necessidades_especiais', ['N' => 'Não', 'S' => 'Sim'], null, ['class' =>
                            'form-control', 'id' => 'necessidades_especiais', 'tabindex' => '52'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="physical_disability_id">Deficiência Física</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            {!! Form::select('physical_disability_id', $physicalDisabilities, null, ['class' =>
                            'form-control
                            ', 'id' => 'physical_disability_id', 'tabindex' => '53']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="observacoes">Observação (Deficiência)</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-comments"></i>
                            </div>
                            {!! Form::textarea('observacoes', null, ['class' => 'form-control', 'id' => 'observacoes',
                            'maxlength'
                            => '100', 'tabindex' => '54', 'rows' => '3']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.tab-pane -->
                        {!! Form::hidden('finalizado', null, ['id' => 'finalizado']) !!}
                        {!! Form::hidden('parcial', null, ['id' => 'parcial']) !!}

                    </div>
                    <p></p>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
    </div>
    <div class="box-footer">

        <button type="button" class="btn btn-primary btn-parcial"><i class="fa fa-save"></i>
            Salvar Parcial
        </button>

    </div>

</div>

<input type="hidden" name="preEdit" val="1">
{!! Form::close() !!}
@stop
@section('adminlte_js')
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/dataTableBr.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/mdb/js/mdb.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/datepicker/locales/traducao-datepicker.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/jquery-fileupload/js/vendor/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/jquery-fileupload/js/jquery.fileupload.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/webcamjs/webcam.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/webcamjs/configcam.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/filestyle/bootstrap-filestyle.min.js') }}"></script>
<script>
    /*
    * Submeter formulário
    */
    $('.btn-parcial').click(function (e) {
        e.preventDefault();
        $('#finalizado').val(false);
        $('#parcial').val(true);

        if (!validarCPF($('#cpf').val())) {
            alert('CPF Inválido!');
        }
        else {
            $('#form').submit();    
        }
    });

    function validarCPF(cpf) {
        cpf = cpf.replace(/[^\d]+/g, '');
        if (cpf == '') return false;
        // Elimina CPFs invalidos conhecidos	
        if (cpf.length != 11 ||
            cpf == "00000000000" ||
            cpf == "11111111111" ||
            cpf == "22222222222" ||
            cpf == "33333333333" ||
            cpf == "44444444444" ||
            cpf == "55555555555" ||
            cpf == "66666666666" ||
            cpf == "77777777777" ||
            cpf == "88888888888" ||
            cpf == "99999999999")
            return false;
        // Valida 1o digito	
        add = 0;
        for (i = 0; i < 9; i++)
            add += parseInt(cpf.charAt(i)) * (10 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(9)))
            return false;
        // Valida 2o digito	
        add = 0;
        for (i = 0; i < 10; i++)
            add += parseInt(cpf.charAt(i)) * (11 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(10)))
            return false;
        return true;
    }

    $('#cpf').change(function () {
        if (!validarCPF($('#cpf').val())) {
            $('.cpf_class').removeClass('has-success');
            $('.cpf_class').addClass('has-error');
        }
        else {
            $('.cpf_class').removeClass('has-error');
            $('.cpf_class').addClass('has-success');
        }
    });

    $('#cpf').keypress(function () {
        if (!validarCPF($('#cpf').val())) {
            $('.cpf_class').removeClass('has-success');
            $('.cpf_class').addClass('has-error');
        }
        else {
            $('.cpf_class').removeClass('has-error');
            $('.cpf_class').addClass('has-success');
        }
    });

    if (!validarCPF($('#cpf').val())) {
        $('.cpf_class').removeClass('has-success');
        $('.cpf_class').addClass('has-error');
    }
    else {
        $('.cpf_class').removeClass('has-error');
        $('.cpf_class').addClass('has-success');
    }

    $(".main-sidebar").remove();
    $(".sidebar-menu").remove();
    $(".navbar-nav").remove();
    $(".sidebar-toggle").remove();
</script>
@stack('js') @yield('js')
@stop