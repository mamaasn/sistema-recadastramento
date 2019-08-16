@extends('adminlte::page')
@section('title', 'Estatísticas')
@section('content_header')
<h1>Estatísticas</h1>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home2') }}">{{ session('company')['nome_fantasia'] ?? 'SisRec' }}</a>
    </li>
    <li>
        <a href="{{ route('relatorios.estatisticas') }}">Estatísticas</a>
    </li>
</ol>

@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Estatísticas</h3>
        <br>
        <br>
    </div>
    <div class="box-body">

        <div class="row">
            <div class="col-sm-4">
                <b>Não Finalizados:</b> {{ $naoFinalizados[0]->quantidade }}
                <b>Parciais:</b> {{ $parciais[0]->quantidade }}
                <b>Finalizados:</b> {{ $finalizados[0]->quantidade }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-9 col-sm-offset-2">
                <canvas id="gráfico"></canvas>
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
<script>

    var ctx = document.getElementById('gráfico').getContext('2d');
    var naoFinalizados = {!! $naoFinalizados[0]->quantidade !!};
    var finalizados = {!! $finalizados[0]->quantidade !!};
    var parciais = {!! $parciais[0]->quantidade !!};

    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    naoFinalizados,
                    parciais,
                    finalizados,
                ],
                backgroundColor: [
                    'rgb(220,20,60)',
                    'rgb(0,191,255)',
                    'rgb(34,139,34)',
                ],
                label: 'Dataset 1'
            }],
            labels: [
                'Não Finalizados',
                'Parciais',
                'Finalizados',
            ]
        },
        options: {
            responsive: true
        }
    };

    window.onload = function () {
        window.myPie = new Chart(ctx, config);
    };
</script>
@stack('js')
@yield('js')
@stop