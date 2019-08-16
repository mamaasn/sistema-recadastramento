@extends('adminlte::page')
@section('title', 'Logs de Usuários')
@section('content_header')
<h1>Logs de Usuários</h1>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home2') }}">{{ session('company')['nome_fantasia'] ?? 'SisRec' }}</a>
    </li>
    <li>
        <a href="{{ route('relatorios.estatisticas') }}">Logs de Usuários</a>
    </li>
</ol>

@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Logs de Usuários</h3>
        <br>
        <br>
    </div>
    <div class="box-body">

        <div class="row">
            <div class="col-sm-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Atualizações de Servidores</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Atualizações de Dependentes</a></li>
                        <li><a href="#tab_3" data-toggle="tab">Atualizações de Tempo Anterior</a></li>
                        <li><a href="#tab_4" data-toggle="tab">Atualizações de Instituidores</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab_1" class="tab-pane active">
                            <h4><strong>Listagem dos Logs de Atualizações a Servidores</strong></h4>
                            <table class="table table-bordered table-striped list-table">
                                <thead>
                                    <tr>
                                        <th>Servidor</th>
                                        <th>Usuário</th>
                                        <th>Ações</th>
                                        <th>Data / Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($logsServants as $logServant)
                                    <tr>
                                        <td>{{ $logServant->servant->nome }}</td>
                                        <td>{{ $logServant->user->name ?? ''}}</td>
                                        <td>{{ $logServant->acoes }}</td>
                                        <td>{{ $logServant->updated_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Servidor</th>
                                        <th>Usuário</th>
                                        <th>Ações</th>
                                        <th>Data / Hora</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div id="tab_2" class="tab-pane">
                            <h4><strong>Listagem dos Logs de Atualizações a Dependentes</strong></h4>
                            <table class="table table-bordered table-striped list-table">
                                <thead>
                                    <tr>
                                        <th>Dependente</th>
                                        <th>Usuário</th>
                                        <th>Ações</th>
                                        <th>Data / Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($logsDependents as $logDependent)
                                    <tr>
                                        <td>{{ $logDependent->dependent->nome }}</td>
                                        <td>{{ $logDependent->user->name }}</td>
                                        <td>{{ $logDependent->acoes }}</td>
                                        <td>{{ $logDependent->updated_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Dependente</th>
                                        <th>Usuário</th>
                                        <th>Ações</th>
                                        <th>Data / Hora</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div id="tab_3" class="tab-pane">
                            <h4><strong>Listagem dos Logs de Atualizações a Tempo Anterior</strong></h4>
                            <table class="table table-bordered table-striped list-table">
                                <thead>
                                    <tr>
                                        <th>Razão Social</th>
                                        <th>CNPJ</th>
                                        <th>Usuário</th>
                                        <th>Ações</th>
                                        <th>Data / Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($logsTimes as $logTime)
                                    <tr>
                                        <td>{{ $logTime->time->razao_social }}</td>
                                        <td>{{ $logTime->time->cnpj }}</td>
                                        <td>{{ $logTime->user->name }}</td>
                                        <td>{{ $logTime->acoes }}</td>
                                        <td>{{ $logTime->updated_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Razão Social</th>
                                        <th>CNPJ</th>
                                        <th>Usuário</th>
                                        <th>Ações</th>
                                        <th>Data / Hora</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div id="tab_4" class="tab-pane">
                            <h4><strong>Listagem dos Logs de Atualizações a Instituidores</strong></h4>
                            <table class="table table-bordered table-striped list-table">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Usuário</th>
                                        <th>Ações</th>
                                        <th>Data / Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($logsFounders as $logFounder)
                                    <tr>
                                        <td>{{ $logFounder->founder->nome }}</td>
                                        <td>{{ $logFounder->user->name }}</td>
                                        <td>{{ $logFounder->acoes }}</td>
                                        <td>{{ $logFounder->updated_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Usuário</th>
                                        <th>Ações</th>
                                        <th>Data / Hora</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="box-footer">

    </div>
</div>
@stop

@section('adminlte_js')
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/filestyle/bootstrap-filestyle.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/dataTableBr.js') }}"></script>

@stack('js')
@yield('js')
@stop