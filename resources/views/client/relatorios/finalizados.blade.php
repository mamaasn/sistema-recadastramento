@extends('adminlte::page') 
@section('title', 'Finalizados') 
@section('content_header')
<h1>Finalizados</h1>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home2') }}">{{ session('company')['nome_fantasia'] ?? 'SisRec' }}</a>
    </li>
    <li>
        <a href="{{ route('relatorios.finalizados') }}">Finalizados</a>
    </li>
</ol>


@stop 
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Servidores Finalizados</h3>
        <br>
        <br>
    </div>
    <div class="box-body">
        <div class="row">
            {!! Form::open(['route' => 'relatorios.finalizados','class' => '', 'id' => 'form']) !!}
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="data_inicio">Data de Início</label> {!! Form::date('data_inicio', null, ['class' => 'form-control',
                    'id' => 'data_inicio']) !!}
                </div>
            </div>
            <div class="col-sm-2" id="wrapper_data_fim">
                <div class="form-group">
                    <label for="data_fim">Data Fim</label> {!! Form::date('data_fim', null, ['class' => 'form-control', 'id'
                    => 'data_fim']) !!}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select class="form-control" name="sexo" id="sexo">
                        <option value="">--- Todos ---</option>
                        <option value="F">Feminino</option>
                        <option value="M">Masculino</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select class="form-control" name="tipo" id="tipo">
                        <option value="">--- Todos ---</option>
                        <option value="pendentes">Pendentes</option>
                        <option value="parciais">Parciais</option>
                        <option value="finalizados">Finalizados</option>
                    </select>
                    </div>
                </div>
            <div class="col-sm-2">
                <button type="submit" style="margin-top: 25px" class="btn btn-primary">Filtrar</button>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="list-table table table-bordered table-striped" id="table-servant-finalized">
                    <thead>
                        <tr>
                            <th>Registro</th>
                            <th>Nome</th>
                            <th>Cpf</th>
                            <th>Rg</th>
                            <th>Sexo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($servants))
                        @foreach ($servants as $servant)
                            <td>{{ $servant->registro }}</td>
                            <td>{{ $servant->nome }}</td>
                            <td>{{ $servant->cpf }}</td>
                            <td>{{ $servant->rg }}</td>
                            <td>{{ $servant->sexo }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Registro</th>
                            <th>Nome</th>
                            <th>Cpf</th>
                            <th>Rg</th>
                            <th>Sexo</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="box-footer">
        @if(isset($servants))
        {!! Form::open(['route' => 'relatorios.finalizados.pdf','class' => '', 'id' => 'formPdf', 'target' => '_blank']) !!}
            {!! Form::hidden('data', $servants) !!}
            <a href="#" target="_blank">
            <button class="btn btn-primary" type="submit">Exportar em PDF</button>
            </a>
        {!! Form::close() !!}
        @endif
    </div>
</div>

@stop 
@section('adminlte_js')
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/filestyle/bootstrap-filestyle.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/dataTableBr.js') }}"></script>
<script>
    $('#wrapper_data_fim').hide();
    $('#data_inicio').change(function(){
        $('#wrapper_data_fim').show();
        $('#data_fim').prop('required', true);
    });
</script>
@stack('js') @yield('js') 
@stop