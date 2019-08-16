@extends('adminlte::page')
@section('title', 'Pré Recadastramento')
@section('content_header')
<h1>Pŕe Recadastramento</h1>
@stop
@section('content')

@if(!$servant->appointment)
<div class="box box-primary">

    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                @include('includes.alerts')
                <h3>{{$servant->nome}}</h3>
                <form method="POST" action="{{ url('agendamentoPost') }}" id="form">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="data_agendada">Dia:</label>
                            <input class="form-control" type="date" name="data_agendada" id="data_agendada">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="hora_agendada">Hora:</label>
                            <input class="form-control" type="time" name="hora_agendada" id="hora_agendada">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button style="margin-top: 24px" type="button" class="btn btn-success btn-block">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

@if($servant->appointment)
<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                @include('includes.alerts')
                <h3>Agendamentos realizados</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>Dia</th>
                        <th>Hora</th>
                        <th>Protocolo</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ date('d/m/Y', strtotime($servant->appointment->data_agendada)) }}</td>
                            <td>{{ $servant->appointment->hora_agendada }}</td>
                            <td>{{ $servant->appointment->protocolo }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif


@stop
@section('adminlte_js')
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/filestyle/bootstrap-filestyle.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/dataTableBr.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    $(".main-sidebar").remove();
    $(".sidebar-menu").remove();
    $(".navbar-nav").remove();
    $(".sidebar-toggle").remove();

    $(".btn-success").click(function() {
        let data_agendada = $("#data_agendada").val();
        let hora_agendada = $("#hora_agendada").val();
        let servant_id = {{$servant->id}}
        axios.post("{{ url('agendamentoPost') }}", {data_agendada, hora_agendada, servant_id}).then(()=>{
            window.location.reload()
        });
    });
</script>
@stack('js') @yield('js')
@stop