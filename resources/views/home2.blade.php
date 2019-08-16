@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>{{ session('company')['nome_fantasia'] ?? 'SisRec' }}</h1>
    <ol class="breadcrumb">
    <li>
        <a href="{{ route('home2') }}">{{ session('company')['nome_fantasia'] ?? 'SisRec' }}</a>
    </li>
</ol>
@stop

@section('content')

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