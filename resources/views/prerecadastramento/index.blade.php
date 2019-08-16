@extends('adminlte::page')
@section('title', 'Pré Recadastramento')
@section('content_header')
<h1>Pŕe Recadastramento</h1>
@stop
@section('content')
<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title"> Servidores encontrados: <b>{{$servants->count()}}</b> vínculo(s) </h3>
    </div>

    <div class="box-body">

        <div class="row">

        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('includes.alerts')
            </div>

        </div>

    </div>

</div>

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listagem</h3>
    </div>
    <div class="box-body">
        <table id="table-dependents" class="table table-bordered table-striped">
            <thead>
                <th>Nome</th>
                <th>CPF</th>
                <th>Cargo</th>
                <th>Agendar Recadastramento</th>
                <th>Pré Recadastramento</th>
            </thead>
            <tbody>
                @foreach($servants as $servant)
                <tr>
                    <td>{{$servant->nome}}</td>
                    <td>{{$servant->cpf}}</td>
                    <td>{{$servant->cargo}}</td>
                    <td><a href="{{ route('agendamento', ['matricula' => $servant->matricula]) }}" class="btn btn-info btn-agendar">Agendar</a></td>
                    <td><a href="{{ route('preEdit', $servant->registro) }}" class="btn btn-primary">Pŕe-Recadastrar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
@section('adminlte_js')
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/filestyle/bootstrap-filestyle.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/dataTableBr.js') }}"></script>
<script>
    $(".main-sidebar").remove();
    $(".sidebar-menu").remove();
    $(".navbar-nav").remove();
    $(".sidebar-toggle").remove();

    $(".btn-agendar").click(function() {
        $("#modal-agendar").modal("show");
    });
</script>
@stack('js') @yield('js')
@stop