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
<h1>Recadastramento</h1>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home2') }}">{{ session('company')['nome_fantasia'] ?? 'SisRec' }}</a>
    </li>
    <li>
        <a href="{{ route('recadastramento.index') }}">Recadastramento</a>
    </li>
    <li>
        <a href="{{ route('recadastramento.create') }}">{{ $servant->nome ?? 'Nome do Servidor' }}</a>
    </li>
</ol>




@stop
@section('content')
@if(isset($servant))
{!! Form::model($servant, ['route' => ['recadastramento.update', $servant->registro], 'id' => 'form', 'enctype' =>
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
                        @role('Recadastrador|Responsável Legal|Admin')
                        @if(!$servant->finalizado)
                        <button type="button" class="btn btn-primary btn-parcial"><i class="fa fa-save"></i>
                            Salvar Parcial
                        </button>
                        @endif()
                        @endrole
                        @role('Recadastrador|Responsável Legal|Admin')
                        @if(!$servant->finalizado)
                        <button type="button" class="mb-sm btn btn-success btn-finalizado"><i class="fa fa-save"></i>
                            Finalizar
                        </button>
                        @endif()
                        @endrole()
                        <a href="{{ route('recadastramento.index') }}">
                            <button type="button" class="btn btn-default"><i class="fa fa-arrow-left"></i>
                                Voltar
                            </button>
                        </a>
                    </div>

                </div>


            </div>
            <div class="col-sm-offset-10">
                <img style="width: 100px; border: 3px solid #337ab7;" src="{{ url('storage/tenants/' . session('company')['uuid'] . '/' . $servant->foto) }}">
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
                        <li><a href="#tab_2" data-toggle="tab">Dados Funcionais</a></li>
                        <li><a href="#tab_3" data-toggle="tab">Tempo de Serviço</a></li>
                        <li><a href="#tab_4" data-toggle="tab">Dependentes</a></li>
                        <li><a href="#tab_5" data-toggle="tab">Instituidores</a></li>
                        <li><a href="#tab_6" data-toggle="tab">Documentos</a></li>
                        @if(!$servant->finalizado)
                        <li><a href="#tab_7" data-toggle="tab">Foto</a></li>
                        @endif

                        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                    </ul>
                    <div class="tab-content">
                        @include('client.recadastramento.tabs.dados_pessoais')
                        @include('client.recadastramento.tabs.dados_funcionais')
                        @include('client.recadastramento.tabs.tempo-servico.dados_tempo_serviço')
                        @include('client.recadastramento.tabs.instituidores.dados_instituidores')
                        @include('client.recadastramento.tabs.dependentes.dados_dependentes')
                        @include('client.recadastramento.tabs.dados_documentos')
                        @if(!$servant->finalizado)
                        @include('client.recadastramento.tabs.dados_foto')
                        @endif
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
        @role('Recadastrador|Responsável Legal|Admin')
        @if(!$servant->finalizado)
        <button type="button" class="btn btn-primary btn-parcial"><i class="fa fa-save"></i>
            Salvar Parcial
        </button>
        @endif()
        @endrole()
        @role('Responsável Legal|Admin')
        @if(!$servant->finalizado)
        <button type="button" class="mb-sm btn btn-success btn-finalizado"><i class="fa fa-save"></i>
            Finalizar
        </button>
        @endif()
        @endrole()
        <a href="{{ route('recadastramento.index') }}">
            <button type="button" class="btn btn-default"><i class="fa fa-arrow-left"></i>
                Voltar
            </button>
        </a>
    </div>

</div>
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
    @if ($servant -> parcial)
        if ($('#nome').val() == '') { //|| $('#cpf').val('') || $('#data_nascimento').val('') || $('#uf_nascimento').val('') || $('#cidade_nascimento').val('') || $('#registro_nascimento').val('') || $('#numero_rg').val('') || $('#orgao_rg').val('') || $('#uf_rg').val('') || $('#data_emissao_rg').val('') || $('#numero_titulo').val('') || $('#zona_titulo').val('') || $('#secao_titulo').val('') || $('#uf_titulo').val('') || $('#numero_ctps').val('') || $('#uf_ctps').val('') || $('#data_emissao_ctps').val('') || $('#pis').val('') || $('#cep').val('') || $('#logradouro').val('') || $('#bairro').val('') || $('#numero').val('') || $('#uf_endereco').val('') || $('#cidade').val('') || $('#fone_celular').val('')) {
            $('.nome_class').addClass('has-warning');
        }
    if ($('#cpf').val() == '') {
        $('.cpf_class').addClass('has-warning');
    }
    if ($('#data_nascimento').val() == '') {
        $('.data_nascimento_class').addClass('has-warning');
    }
    if ($('#uf_nascimento').val() == '') {
        $('.uf_nascimento_class').addClass('has-warning');
    }
    if ($('#cidade_nascimento').val() == '') {
        $('.cidade_nascimento_class').addClass('has-warning');
    }
    if ($('#registro_nascimento').val() == '') {
        $('.registro_nascimento_class').addClass('has-warning');
    }
    if ($('#numero_rg').val() == '') {
        $('.numero_rg_class').addClass('has-warning');
    }
    if ($('#orgao_rg').val() == '') {
        $('.orgao_rg_class').addClass('has-warning');
    }
    if ($('#uf_rg').val() == '') {
        $('.uf_rg_class').addClass('has-warning');
    }
    if ($('#data_emissao_rg').val() == '') {
        $('.data_emissao_rg_class').addClass('has-warning');
    }
    if ($('#numero_titulo').val() == '') {
        $('.numero_titulo_class').addClass('has-warning');
    }
    if ($('#zona_titulo').val() == '') {
        $('.zona_titulo_class').addClass('has-warning');
    }
    if ($('#secao_titulo').val() == '') {
        $('.secao_titulo_class').addClass('has-warning');
    }
    if ($('#uf_titulo').val() == '') {
        $('.uf_titulo_class').addClass('has-warning');
    }
    if ($('#numero_ctps').val() == '') {
        $('.numero_ctps_class').addClass('has-warning');
    }
    if ($('#serie_ctps').val() == '') {
        $('.serie_ctps_class').addClass('has-warning');
    }
    if ($('#uf_ctps').val() == '') {
        $('.uf_ctps_class').addClass('has-warning');
    }
    if ($('#data_emissao_ctps').val() == '') {
        $('.data_emissao_ctps_class').addClass('has-warning');
    }
    if ($('#pis').val() == '') {
        $('.pis_class').addClass('has-warning');
    }
    if ($('#cep').val() == '') {
        $('.cep_class').addClass('has-warning');
    }
    if ($('#logradouro').val() == '') {
        $('.logradouro_class').addClass('has-warning');
    }
    if ($('#bairro').val() == '') {
        $('.bairro_class').addClass('has-warning');
    }
    if ($('#numero').val() == '') {
        $('.numero_class').addClass('has-warning');
    }
    if ($('#uf_endereco').val() == '') {
        $('.uf_endereco_class').addClass('has-warning');
    }
    if ($('#cidade').val() == '') {
        $('.cidade_class').addClass('has-warning');
    }
    @endif

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

    $('.btn-finalizado').click(function (e) {
        e.preventDefault();
        $('#finalizado').val(true);
        $('#parcial').val(false);

        if (!validarCPF($('#cpf').val())) {
            alert('CPF Inválido!');
        }
        else {
            $('#form').submit();    
        }
    });

    /*
    * Mascaras
    */
    $('#cpf').inputmask('999.999.999-99');
    $('#cpf_mae').inputmask('999.999.999-99');
    $('#cpf_pai').inputmask('999.999.999-99');
    $('#cpf_dependente').inputmask('999.999.999-99');
    $('#cpf_instituidor').inputmask('999.999.999-99');
    $('#numero_rg').inputmask('##.###.###-#');
    $('#numero_rg_dependente').inputmask('##.###.###-#');
    $('#data_emissao_rg').inputmask('99/99/9999');
    $('#data_nascimento').inputmask('99/99/9999');
    $('#data_emissao_rg_dependente').inputmask('99/99/9999');
    $('#data_nascimento_dependente').inputmask('99/99/9999');
    $('#cnpj').inputmask('99.999.999/9999-99');
    $('#data_emissao_ctps').inputmask('99/99/9999');
    $('#data_nascimento_instituidor').inputmask('99/99/9999');
    $('#data_falecimento_instituidor').inputmask('99/99/9999');
    $('#data_expedicao_cnh').inputmask('99/99/9999');
    $('#data_validade_cnh').inputmask('99/99/9999');
    $('#data_admissao').inputmask('99/99/9999');
    $('#data_concessao_beneficio').inputmask('99/99/9999');
    $('#telefone_fixo').inputmask('(99) 9999-9999');
    $('#fone_celular').inputmask('(99) 99999-9999');
    $('#pis').inputmask('999.99999.99/9');
    $('#data_inicio').inputmask('99/99/9999');
    $('#data_fim').inputmask('99/99/9999');
    $('#data_inicio_vinculo').inputmask('99/99/9999');
    $('#data_fim_vinculo').inputmask('99/99/9999');
    $('#data_emissao_rg_representante').inputmask('99/99/9999');
    $('#data_nascimento_representante').inputmask('99/99/9999');
    $('#telefone_fixo_representante').inputmask('(99) 9999-9999');
    $('#fone_celular_representante').inputmask('(99) 99999-9999');

    /*
    * Desabilitar campos de cargo
    */
    $('#matricula').prop('disabled', true);
    $('#cargo').prop('disabled', true);
    $('#data_admissao').prop('disabled', true);
    $('#orgao').prop('disabled', true);
    $('#departamento').prop('disabled', true);
    //$('#data_concessao_beneficio').prop('disabled', true);
    //$('#numero_concessao_beneficio').prop('disabled', true);
    //$('#tipo_beneficio').prop('disabled', true);

    /*
    * Iniciar Select2
    */
    $('select').select2({
        placeholder: "Selecione uma opção",
        allowClear: true,
        width: 'resolve'
    });

    @if($servant->tipo_sanguineo == '')
        $('#tipo_sanguineo').prepend('<option selected=""></option>').select2({placeholder: "Selecione uma opção"});
    @endif

    @if($servant->doador == '')
        $('#doador').prepend('<option selected=""></option>').select2({placeholder: "Selecione uma opção"});
    @endif
    
    @if($servant->race_id == '')
        $('#race_id').prepend('<option selected=""></option>').select2({placeholder: "Selecione uma opção"});
    @endif

    @if($servant->necessidades_especiais == '')
        $('#necessidades_especiais').prepend('<option selected=""></option>').select2({placeholder: "Selecione uma opção"});
    @endif

    @if($servant->physical_disability_id == '')
        $('#physical_disability_id').prepend('<option selected=""></option>').select2({placeholder: "Selecione uma opção"});
    @endif

    @if($servant->tipo_beneficio == '')
        $('#tipo_beneficio').prepend('<option selected=""></option>').select2({placeholder: "Selecione uma opção"});
    @endif
    

    $('#tipo_beneficio').change(function () {
        if ($('#tipo_beneficio option').filter(':selected').text() === 'Pensão por Morte') {
            $('#data_concessao_beneficio').attr('name', 'data_concessao_pensao');
            $('#numero_beneficio').hide();
        }
        else {
            $('#data_concessao_beneficio').attr('name', 'data_concessao_aposentadoria');
            $('#numero_beneficio').show();
        }
    });

    $('.representante_class').hide();
    $('#tipo_declarante').change(function () {
        if ($('#tipo_declarante option').filter(':selected').text() != 'O próprio') {
            $('.representante_class').show();
        } else {
            $('.representante_class').hide();
        }
    });

    @if ($servant->tipo_declarante == 'representante')
        $('.representante_class').show();
    @endif()


    /*
    * Iniciar Table Documente
    */
    $urlDocument = '{!! url("load-files") !!}' + '/' + '{!! $servant->registro !!}'
    initialiseTableDocument($urlDocument);

    /*
    * Iniciar Table Dependents
    */
    var $urlDependents = '{!! url("load-dependents") !!}' + '/' + '{!! $servant->registro !!}'
    initialiseTableDependents($urlDependents);

    var $urlFounders = '{!! url("load-founders") !!}' + '/' + '{!! $servant->registro !!}'
    initialiseTableFounders($urlFounders);

    var $urlTimes = '{!! url("load-times") !!}' + '/' + '{!! $servant->registro !!}'
    initialiseTableTimes($urlTimes);

    /*
    * Iniciar Tooltip
    */
    $('[data-toggle="tooltip"]').tooltip();

    $(".progress").hide();

    /*
    * Carregar ENDERECO
    */
    $(document).bind("ajaxSend", function () {
        $(".progress").show();
    }).bind("ajaxComplete", function () {
        $(".progress").hide();
    });
    $('#cep').keypress(function (e) {

        if (e.which == 13) {
            if ($('#cep').val() != '' && $('#cep').val().length === 8) {
                e.preventDefault();
                var cep = $('#cep').val();
                var url = 'https://api.postmon.com.br/v1/cep/' + cep;
                $.get(url, function (resultado) {

                    $('#cidade_codigo_ibge').val(resultado.cidade_info.codigo_ibge);
                    $('#logradouro').val(resultado.logradouro);
                    $('#bairro').val(resultado.bairro);
                    $('#cidade').val(resultado.cidade);
                    $('#uf_endereco').val(resultado.estado);
                    $('#codigo-ibge').html(resultado.cidade_info.codigo_ibge);
                });
            }
            e.preventDefault();
        }

    });

    $('input').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    });

    /*
    * Estilizar input file
    */
    $(":file").filestyle({
        text: "Selecione arquivos",
        btnClass: "btn-primary"
    });

    $('#enviarDoc').hide();
    var formData;
    $('#arquivos').change(function (e) {
        formData = new FormData();

        var filesLength = e.target.files.length;

        for (var i = 0; i < filesLength; i++) {
            formData.append('arquivos[]', e.target.files[i]);
        }

        formData.append('registro', '{!! $servant->registro !!}');
        $('#enviarDoc').show();
    });

    $('#enviarDoc').click(function (e) {
        e.preventDefault();

        console.log(formData);

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{!! csrf_token() !!}'
            },
            contentType: false,
            url: "{!! route('files') !!}",
            data: formData,
            processData: false,
            success: function (response) {
                $('#msgs-alerts').html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='fa fa-check'></i> Sucesso!</h4> Arquivos enviados com sucesso! </div>");
                $('#enviarDoc').hide();
                $urlDocument = '{!! url("load-files") !!}' + '/' + '{!! $servant->registro !!}'
                initialiseTableDocument($urlDocument);
            },
            error: function (data) {
                $('#msgs-alerts').html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='fa fa-danger'></i> Erro!</h4>Erro ao enviar arquivos!<br>" + "</div>");
                $('#enviarDoc').hide();
            }
        });

    });
    $('#deleteFileModal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var fileId = button.data('fileid');
        var nameFile = button.data('namefile');

        var modal = $(this)
        modal.find('p').html('Deseja deletar o arquivo <b>' + nameFile + '</b> ? *Esta ação não poderá ser desfeita');

        var btnDeleteFile = modal.find('.btn-delete-file');

        btnDeleteFile.click(function (e) {
            $.ajax({
                type: 'GET',
                url: '{!! url("delete-file") !!}' + '/' + fileId,
                success: function (response) {
                    $('#msgs-alerts').html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='fa fa-check'></i> Sucesso!</h4> Arquivo deletado com sucesso! </div>");
                    $urlDocument = '{!! url("load-files") !!}' + '/' + '{!! $servant->registro !!}'
                    initialiseTableDocument($urlDocument);
                    modal.modal('hide');
                },
                error: function (data) {
                    $('#msgs-alerts').html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='fa fa-danger'></i> Erro!</h4>Erro ao deletar arquivo!<br>" +  "</div>");
                }
            });
        });
    });

    $('.btn-salvar-dependente').click(function (e) {
        e.preventDefault();

        var Data = new FormData();
        var nome = $('#nome_dependente').val();

        Data.append('nome', $('#nome_dependente').val());
        Data.append('cpf', $('#cpf_dependente').val());
        Data.append('numero_rg', $('#numero_rg_dependente').val());
        Data.append('orgao_rg', $('#orgao_rg_dependente').val());
        Data.append('uf_rg', $('#uf_rg_dependente').val());
        Data.append('data_emissao_rg', $('#data_emissao_rg_dependente').val());
        Data.append('sexo', $('#sexo_dependente').val());
        Data.append('data_nascimento', $('#data_nascimento_dependente').val());
        Data.append('nome_mae', $('#nome_mae_dependente').val());
        Data.append('nome_pai', $('#nome_pai_dependente').val());
        Data.append('cidade_nascimento', $('#cidade_nascimento_dependente').val());
        Data.append('uf_nascimento', $('#uf_nascimento_dependente').val());
        Data.append('nome_cartorio', $('#nome_cartorio').val());
        Data.append('numero_registro_cartorio', $('#numero_registro_cartorio').val());
        Data.append('numero_livro_cartorio', $('#numero_livro_cartorio').val());
        Data.append('numero_folha_cartorio', $('#numero_folha_cartorio').val());
        Data.append('naturalidade', $('#naturalidade_dependente').val());
        Data.append('tipo_dependencia', $('#tipo_dependencia').val());
        Data.append('deficiente', $('#deficiente').val());
        Data.append('invalido', $('#invalido').val());
        Data.append('universitario', $('#universitario').val());
        Data.append('kinship_id', $('#kinship_id').val());
        Data.append('registro', '{!! $servant->registro !!}');

        Data.append('atualizar', updateDependent);
        console.log(updateDependent);
        if (updateDependent) {
            Data.append('id', dadosDependentes[0].id);
        }

        //console.log(Data);

        $.ajax({
            type: 'POST',
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': '{!! csrf_token() !!}'
            },
            url: "{!! route('save-dependent') !!}",
            data: Data,
            success: function (response) {
                $('#msg-alerts-dependent').html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='fa fa-check'></i> Sucesso!</h4> Depedente: <b>" + nome + "</b> cadastrado e associado com o Servidor: <b>{!! $servant->nome !!}</b></div>");
                $('#modal-dependente').modal('hide');
                clearDepedentInputs();
                var $urlDependents = '{!! url("load-dependents") !!}' + '/' + '{!! $servant->registro !!}'
                initialiseTableDependents($urlDependents);
            },
            error: function (data) {
                $('#msg-alerts-dependent').html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='fa fa-danger'></i> Erro!</h4>" +  "</div>");
                $('#modal-dependente').modal('hide');
            }
        });

    });

    var dadosDependentes;

    $('#modal-show-dependente').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var dependent_id = button.data('dependent_id');

        $.ajax({
            type: 'GET',
            url: '{!! url("load-dependent") !!}' + '/' + dependent_id,
            success: function (response) {
                dadosDependentes = response;
                $('#modal_nome_dependente').html(response[0].nome);
                $('#modal_sexo_dependente').html(response[0].sexo);
                $('#modal_data_nascimento_dependente').html(response[0].data_nascimento);
                $('#modal_cidade_nascimento_dependente').html(response[0].cidade_nascimento);
                $('#modal_uf_nascimento_dependente').html(response[0].uf_nascimento);
                $('#modal_parentesco_dependente').html(response[0].parentesco);
                $('#modal_tipo_dependencia_dependente').html(response[0].tipo_dependencia);
                $('#modal_deficiente_dependente').html(response[0].deficiente);
                $('#modal_invalido_dependente').html(response[0].invalido);
                $('#modal_universitario_dependente').html(response[0].universitario);
                $('#modal_naturalidade_dependente').html(response[0].naturalidade);
                $('#modal_cpf_dependente').html(response[0].cpf);
                $('#modal_numero_rg_dependente').html(response[0].numero_rg);
                $('#modal_data_emissao_rg_dependente').html(response[0].data_emissao_rg);
                $('#modal_orgao_rg_dependente').html(response[0].orgao_rg);
                $('#modal_uf_rg_dependente').html(response[0].uf_rg);
                $('#modal_numero_livro_dependente').html(response[0].numero_livro_cartorio);
                $('#modal_folha_dependente').html(response[0].numero_folha_cartorio);
                $('#modal_nome_cartorio_dependente').html(response[0].nome_cartorio);
                $('#modal_registro_dependente').html(response[0].numero_registro_cartorio);
                $('#modal_mae_dependente').html(response[0].nome_mae);
                $('#modal_pai_dependente').html(response[0].nome_pai);
            },
            error: function (data) {
            }
        });

    });

    clearDepedentInputs();

    function clearDepedentInputs() {
        $('#nome_dependente').val('');
        $('#cpf_dependente').val('');
        $('#numero_rg_dependente').val('');
        $('#orgao_rg_dependente').val('');
        $('#uf_rg_dependente').val('');
        $('#data_emissao_rg_dependente').val('');
        $('#data_nascimento_dependente').val('');
        $('#nome_mae_dependente').val('');
        $('#nome_pai_dependente').val('');
        $('#cidade_nascimento_dependente').val('');
        $('#uf_nascimento_dependente').val('');
        $('#nome_cartorio').val('');
        $('#numero_registro_cartorio').val('');
        $('#numero_livro_cartorio').val('');
        $('#numero_folha_cartorio').val('');
        $('#naturalidade_dependente').val('');
        $('#tipo_dependencia').val('');
    }

    function getUrlSearchDepedent() {
        var $name = $('#searchDependent').val();

        if ($name === '') {
            $('#validation-dependent').addClass('has-error');
            $('#error-dependent').html('Campo vazio!');
            return false;
        }
        if ($name.length < 3) {
            $('#validation-dependent').addClass('has-error');
            $('#error-dependent').html('Digite pelo menos 3 caracteres para pesquisar!');
            return false;
        }
        var $url = '/search-depedents/' + $name;
        return $url;
    }

    $('#btnSearchDependent').click(function () {
        if (!getUrlSearchDepedent()) {

        } else {
            $('#validation-servant').removeClass('has-error');
            $('#error-servant').html('');
            initialiseTableSearchDependents(getUrlSearchDepedent());
            console.log(getUrlSearchDepedent());
        }
    });

    $('#searchDependent').keypress(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            if (!getUrlSearchDepedent()) {

            } else {
                $('#validation-servant').removeClass('has-error');
                $('#error-servant').html('');
                initialiseTableSearchDependents(getUrlSearchDepedent());
            }
        }
    });

    function associateServant(e) {
        dependent_id = $(e).attr('data-dependent_id');

        $("#modal-vincular-dependent").modal('show');

        $("#btn-associate-dependent").on("click", function () {
            $("#modal-vincular-dependent").modal('hide');
            $("#modal-search-dependente").modal('hide');

            var me = $(this);
            if (me.data('requestRunning')) {
                return;
            }
            me.data('requestRunning', true);

            $.ajax({
                type: 'GET',
                url: '{!! url("associate-dependent") !!}' + '/{!! $servant->registro !!}' + '/' + dependent_id + '/' + $('#parentesco_dependente').val(),
                success: function (response) {
                    $('#msg-alerts-dependent').html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='fa fa-check'></i> Sucesso!</h4> Depedente desvinculado com o Servidor</div>");
                    var $urlDependents = '{!! url("load-dependents") !!}' + '/' + '{!! $servant->registro !!}'
                    initialiseTableDependents($urlDependents);
                },
                error: function (data) {
                },
                complete: function () {
                    me.data('requestRunning', false);
                }
            });
        });

        $("#btn-cancel-dependent").on("click", function () {
            $("#modal-vincular-dependent").modal('hide');
            $("#modal-search-dependente").modal('hide');
        });


    }

    function desassociateDependent(e) {
        dependent_id = $(e).attr('data-dependent_id');

        var modalConfirm = function (callback) {

            $("#desassociateDependent").modal('show');

            $("#btn-desassociate-dependent").on("click", function () {
                callback(true);
                $("#desassociateDependent").modal('hide');
            });

            $("#btn-cancel").on("click", function () {
                callback(false);
                $("#desassociateDependent").modal('hide');
            });
        };

        modalConfirm(function (confirm) {
            if (confirm) {

                var me = $(this);
                if (me.data('requestRunning')) {
                    return;
                }
                me.data('requestRunning', true);

                $.ajax({
                    type: 'GET',
                    url: '{!! url("desassociate-dependent") !!}' + '/{!! $servant->registro !!}' + '/' + dependent_id,
                    success: function (response) {
                        $('#msg-alerts-dependent').html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='fa fa-check'></i> Sucesso!</h4> Depedente desvinculado com o Servidor</div>");
                        var $urlDependents = '{!! url("load-dependents") !!}' + '/' + '{!! $servant->registro !!}'
                        initialiseTableDependents($urlDependents);
                    },
                    error: function (data) {
                    },
                    complete: function () {
                        me.data('requestRunning', false);
                    }
                });
            }
        });
    }

    clearFoundersInputs();

    function clearFoundersInputs() {
        $('#nome_instituidor').val('');
        $('#cpf_instituidor').val('');
        $('#uf_instituidor').val('');
        $('#data_nascimento_instituidor').val('');
        $('#data_falecimento_instituidor').val('');
    }

    $('#modal-instituidor').on('hide.bs.modal', function (e) {
        clearFoundersInputs();
    });

    $('#modal-dependente').on('hide.bs.modal', function (e) {
        clearDepedentInputs();
        updateDependent = false;
    });

    $('.btn-save-founder').click(function (e) {
        e.preventDefault();

        var Data = new FormData();

        Data.append('nome', $('#nome_instituidor').val());
        Data.append('cpf', $('#cpf_instituidor').val());
        Data.append('sexo', $('#sexo_instituidor').val());
        Data.append('uf', $('#uf_instituidor').val());
        Data.append('nationality_id', $('#nacionalidade_instituidor').val());
        Data.append('data_nascimento', $('#data_nascimento_instituidor').val());
        Data.append('data_falecimento', $('#data_falecimento_instituidor').val());
        Data.append('registro', '{!! $servant->registro !!}')

        Data.append('atualizar', updateFounder);
        if (updateFounder) {
            Data.append('id', dadosInstituidores.id);
        }

        $.ajax({
            type: 'POST',
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': '{!! csrf_token() !!}'
            },
            url: "{!! route('save-founder') !!}",
            data: Data,
            success: function (response) {
                $('#msg-alerts-founder').html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='fa fa-check'></i> Sucesso!</h4> Instituidor cadastrado e vinculado com Servidor</div>");
                $('#modal-instituidor').modal('hide');
                var $urlFounders = '{!! url("load-founders") !!}' + '/' + '{!! $servant->registro !!}'
                initialiseTableFounders($urlFounders);
            },
            error: function (data) {
                $('#msg-alerts-founder').html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='fa fa-danger'></i> Erro!</h4>" +  "</div>");
                $('#modal-instituidor').modal('hide');
            }
        });

    });


    function desassociateFounder(e) {
        founder_id = $(e).attr('data-founder_id');

        var modalConfirm = function (callback) {

            $("#desassociateFounder").modal('show');

            $("#btn-desassociate-founder").on("click", function () {
                callback(true);
                $("#desassociateFounder").modal('hide');
            });

            $("#btn-cancel-founder").on("click", function () {
                callback(false);
                $("#desassociateFounder").modal('hide');
            });
        };

        modalConfirm(function (confirm) {
            if (confirm) {

                var me = $(this);
                if (me.data('requestRunning')) {
                    return;
                }
                me.data('requestRunning', true);

                $.ajax({
                    type: 'GET',
                    url: '{!! url("desassociate-founder") !!}' + '/{!! $servant->registro !!}' + '/' + founder_id,
                    success: function (response) {
                        $('#msg-alerts-founder').html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='fa fa-check'></i> Sucesso!</h4> Instituidor desvinculado com o Servidor</div>");
                        var $urlFounders = '{!! url("load-founders") !!}' + '/' + '{!! $servant->registro !!}'
                        initialiseTableFounders($urlFounders);
                    },
                    error: function (data) {
                    },
                    complete: function () {
                        me.data('requestRunning', false);
                    }
                });
            }
        });
    }

    var dadosInstituidores;

    $('#modal-show-founder').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var founder_id = button.data('founder_id');

        $.ajax({
            type: 'GET',
            url: '{!! url("load-founder") !!}' + '/' + founder_id,
            success: function (response) {
                dadosInstituidores = response;
                $('#modal_nome_instituidor').html(response.nome);
                $('#modal_cpf_instituidor').html(response.cpf);
                $('#modal_sexo_instituidor').html(response.sexo);
                $('#modal_uf_instituidor').html(response.uf);
                $('#modal_nacionalidade_instituidor').html(response.nationality.nome);
                $('#modal_data_nascimento_instituidor').html(response.data_nascimento);
                $('#modal_data_falecimento_instituidor').html(response.data_falecimento);
            },
            error: function (data) {
            }
        });
    });

    function getUrlSearchFounder() {
        var $name = $('#searchFounder').val();

        if ($name === '') {
            $('#validation-founder').addClass('has-error');
            $('#error-founder').html('Campo vazio!');
            return false;
        }
        if ($name.length < 3) {
            $('#validation-founder').addClass('has-error');
            $('#error-founder').html('Digite pelo menos 3 caracteres para pesquisar!');
            return false;
        }
        var $url = '/search-founders/' + $name;
        return $url;
    }

    $('#btnSearchFounder').click(function () {
        if (!getUrlSearchFounder()) {

        } else {
            $('#validation-servant').removeClass('has-error');
            $('#error-servant').html('');
            initialiseTableSearchFounders(getUrlSearchFounder());
        }
    });

    $('#searchFounder').keypress(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            if (!getUrlSearchFounder()) {

            } else {
                $('#validation-servant').removeClass('has-error');
                $('#error-servant').html('');
                initialiseTableSearchFounders(getUrlSearchFounder());
            }
        }
    });

    function associateFounder($founder_id) {

        var Data = new FormData();

        Data.append('id', $founder_id);
        Data.append('registro', '{!! $servant->registro !!}');

        $.ajax({
            type: 'POST',
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': '{!! csrf_token() !!}'
            },
            url: "{!! route('associate-founder') !!}",
            data: Data,
            success: function (response) {
                $('#msg-alerts-founder').html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='fa fa-check'></i> Sucesso!</h4> Instituidor vinculado com o Servidor</div>");
                $('#modal-search-founder').modal('hide');
                var $urlDependents = '{!! url("load-founders") !!}' + '/' + '{!! $servant->registro !!}'
                initialiseTableFounders($urlDependents);
                $('.table-search-founders').DataTable().clear();
                $('.table-search-founders').DataTable().destroy();
            },
            error: function (data) {
                $('#msg-alerts-founder').html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='fa fa-danger'></i> Erro!</h4>" +  "</div>");
                $('#modal-search-founder').modal('hide');
                $('.table-search-founders').DataTable().clear();
                $('.table-search-founders').DataTable().destroy();
            }
        });
    }

    $('.btn-save-times').click(function (e) {
        e.preventDefault();

        var Data = new FormData();

        Data.append('data_inicio', $('#data_inicio').val());
        Data.append('data_fim', $('#data_fim').val());
        Data.append('razao_social', $('#razao_social').val());
        Data.append('cnpj', $('#cnpj').val());
        Data.append('natureza_juridica', $('#natureza_juridica').val());
        Data.append('tipo_regime_trabalho', $('#tipo_regime_trabalho').val());
        Data.append('tipo_vinculo', $('#tipo_vinculo').val());
        Data.append('caracteristicas_especiais', $('#caracteristicas_especiais').val());

        Data.append('registro', '{!! $servant->registro !!}');

        Data.append('atualizar', updateTime);
        if (updateTime) {
            Data.append('id', dadosTempo.id);
        }


        $.ajax({
            type: 'POST',
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': '{!! csrf_token() !!}'
            },
            url: "{!! route('save-time') !!}",
            data: Data,
            success: function (response) {
                $('#msg-alerts-times').html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='fa fa-check'></i> Sucesso!</h4> Tempo Anterior cadastrado e vinculado com Servidor</div>");
                $('#modal-tempo').modal('hide');
                var $urlTimes = '{!! url("load-times") !!}' + '/' + '{!! $servant->registro !!}'
                initialiseTableTimes($urlTimes);

            },
            error: function (data) {
                $('#msg-alerts-times').html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='fa fa-danger'></i> Erro!</h4>" +  "</div>");
                $('#modal-tempo').modal('hide');
            }
        });

    });

    function desassociateTime(e) {
        time_id = $(e).attr('data-time_id');

        var modalConfirm = function (callback) {

            $("#desassociateTime").modal('show');

            $("#btn-desassociate-time").on("click", function () {
                callback(true);
                $("#desassociateTime").modal('hide');
            });

            $("#btn-cancel-time").on("click", function () {
                callback(false);
                $("#desassociateTime").modal('hide');
            });
        };

        modalConfirm(function (confirm) {
            if (confirm) {

                var me = $(this);
                if (me.data('requestRunning')) {
                    return;
                }
                me.data('requestRunning', true);

                $.ajax({
                    type: 'GET',
                    url: '{!! url("desassociate-time") !!}' + '/{!! $servant->registro !!}' + '/' + time_id,
                    success: function (response) {
                        $('#msg-alerts-time').html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='fa fa-check'></i> Sucesso!</h4> Empresa e Tempo Anterior desvinculado com o Servidor</div>");
                        var $urlTimes = '{!! url("load-times") !!}' + '/' + '{!! $servant->registro !!}'
                        initialiseTableTimes($urlTimes);
                    },
                    error: function (data) {
                    },
                    complete: function () {
                        me.data('requestRunning', false);
                    }
                });
            }
        });
    }


    clearTimesInputs();

    function clearTimesInputs() {
        $('#data_inicio').val('');
        $('#data_fim').val('');
        $('#razao_social').val('');
        $('#cnpj').val('');
        $('#tipo_vinculo').val('');
        $('#numero_ctc').val('');
    }

    $('#modal-tempo').on('hide.bs.modal', function (e) {
        clearTimesInputs();
        updateTime = false;
    });

    var dadosTempo;

    $('#modal-show-time').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var time_id = button.data('time_id');

        $.ajax({
            type: 'GET',
            url: '{!! url("load-time") !!}' + '/{!! $servant->registro !!}' + '/' + time_id,
            success: function (response) {
                dadosTempo = response;
                $('#modal_data_inicio').html(response.pivot.data_inicio);
                $('#modal_data_fim').html(response.pivot.data_fim);
                $('#modal_razao_social').html(response.razao_social);
                $('#modal_cnpj').html(response.cnpj);
                $('#modal_natureza_juridica').html(response.natureza_juridica);
                $('#modal_tipo_regime_trabalho').html(response.pivot.tipo_regime_trabalho);
                $('#modal_tipo_vinculo').html(response.pivot.tipo_vinculo);
                $('#modal_caracteristicas_especiais').html(response.pivot.caracteristicas_especiais);

            },
            error: function (data) {
            }
        });
    });

    function getUrlSearchTime() {
        var $name = $('#searchTime').val();

        if ($name === '') {
            $('#validation-time').addClass('has-error');
            $('#error-time').html('Campo vazio!');
            return false;
        }
        if ($name.length < 3) {
            $('#validation-time').addClass('has-error');
            $('#error-time').html('Digite pelo menos 3 caracteres para pesquisar!');
            return false;
        }
        var $url = '/search-times/' + $name;
        return $url;
    }

    $('#btnSearchTime').click(function () {
        if (!getUrlSearchTime()) {

        } else {
            $('#validation-time').removeClass('has-error');
            $('#error-time').html('');
            initialiseTableSearchTimes(getUrlSearchTime());
        }
    });

    $('#searchTime').keypress(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            if (!getUrlSearchTime()) {

            } else {
                $('#validation-time').removeClass('has-error');
                $('#error-time').html('');
                initialiseTableSearchTimes(getUrlSearchTime());
            }
        }
    });

    $('#modal-search-time').on('hide.bs.modal', function (e) {
        $('.table-search-times').DataTable().clear();
        $('.table-search-times').DataTable().destroy();
    });


    function associateTime(e) {
        time_id = $(e).attr('data-time_id');
        var modalConfirm = function (callback) {

            $("#modal-vincular-time").modal('show');

            $("#btn-associate-time").on("click", function () {
                callback(true);
                $("#modal-vincular-time").modal('hide');
            });

            $("#btn-cancel-time2").on("click", function () {
                callback(false);
                $("#modal-vincular-time").modal('hide');
            });
        };

        modalConfirm(function (confirm) {
            if (confirm) {

                var me = $(this);
                if (me.data('requestRunning')) {
                    return;
                }
                me.data('requestRunning', true);

                var data_inicio = $('#data_inicio_vinculo').val();
                data_inicio = data_inicio.replace(/\//g, "-");

                var data_fim = $('#data_fim_vinculo').val();
                data_fim = data_fim.replace(/\//g, "-");

                $.ajax({
                    type: 'GET',
                    url: '{!! url("associate-time") !!}' + '/{!! $servant->registro !!}' + '/' + time_id + '/' + data_inicio + '/' + data_fim + '/' + $('#tipo_vinculo_vinculo').val() + '/' + $('#tipo_regime_trabalho_vinculo').val() + '/' + $('#caracteristicas_especiais_vinculo').val(),
                    success: function (response) {
                        $('#msg-alerts-times').html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='fa fa-check'></i> Sucesso!</h4> Empresa e Tempo Anterior desvinculado com o Servidor</div>");
                        $('#modal-search-time').modal('hide');
                        var $urlTimes = '{!! url("load-times") !!}' + '/' + '{!! $servant->registro !!}'
                        initialiseTableTimes($urlTimes);
                    },
                    error: function (data) {
                    },
                    complete: function () {
                        me.data('requestRunning', false);
                    }
                });
            }
        });

    }

    /************************* */
    var updateTime = false;
    var updateDependent = false;
    var updateFounder = false;

    function atualizarTempo() {

        $('#data_inicio').val(dadosTempo.pivot.data_inicio);
        $('#data_fim').val(dadosTempo.pivot.data_fim);
        $('#razao_social').val(dadosTempo.razao_social);
        $('#cnpj').val(dadosTempo.cnpj);
        $('#natureza_juridica').val(dadosTempo.natureza_juridica);
        $('#tipo_regime_trabalho').val(dadosTempo.pivot.tipo_regime_trabalho);
        $('#tipo_vinculo').val(dadosTempo.pivot.tipo_vinculo);
        $('#caracteristicas_especiais').val(dadosTempo.pivot.caracteristicas_especiais);

        updateTime = true;

        $('#modal-show-time').modal('hide');
        $('#modal-tempo').modal('show');

    }

    function atualizarDependente() {
        $('body').css('padding-right', '0px !important');

        $('#nome_dependente').val(dadosDependentes[0].nome);
        $('#cpf_dependente').val(dadosDependentes[0].cpf);
        $('#numero_rg_dependente').val(dadosDependentes[0].numero_rg);
        $('#orgao_rg_dependente').val(dadosDependentes[0].orgao_rg);
        $('#uf_rg_dependente').val(dadosDependentes[0].uf_rg);
        $('#data_emissao_rg_dependente').val(dadosDependentes[0].data_emissao_rg);
        $('#data_nascimento_dependente').val(dadosDependentes[0].data_nascimento);
        $('#nome_mae_dependente').val(dadosDependentes[0].nome_mae);
        $('#nome_pai_dependente').val(dadosDependentes[0].nome_pai);
        $('#cidade_nascimento_dependente').val(dadosDependentes[0].cidade_nascimento);
        $('#uf_nascimento_dependente').val(dadosDependentes[0].uf_nascimento);
        $('#nome_cartorio').val(dadosDependentes[0].nome_cartorio);
        $('#numero_registro_cartorio').val(dadosDependentes[0].numero_registro_cartorio);
        $('#numero_livro_cartorio').val(dadosDependentes[0].numero_livro_cartorio);
        $('#numero_folha_cartorio').val(dadosDependentes[0].numero_folha_cartorio);
        $('#naturalidade_dependente').val(dadosDependentes[0].naturalidade);
        $('#tipo_dependencia').val(dadosDependentes[0].tipo_dependencia);
        $('#sexo_dependente').val(dadosDependentes[0].sexo);
        $('#kinship_id').val(dadosDependentes[0].kinship_id);
        $('#deficiente').val(dadosDependentes[0].deficiente);
        $('#invalido').val(dadosDependentes[0].invalido);
        $('#universitario').val(dadosDependentes[0].universitario);

        updateDependent = true;

        $('#modal-show-dependente').modal('hide');
        $('#modal-dependente').modal('show');

    }

    function atualizarInstituidor() {
        $('#nome_instituidor').val(dadosInstituidores.nome);
        $('#cpf_instituidor').val(dadosInstituidores.cpf);
        $('#uf_instituidor').val(dadosInstituidores.uf);
        $('#data_nascimento_instituidor').val(dadosInstituidores.data_nascimento);
        $('#data_falecimento_instituidor').val(dadosInstituidores.data_falecimento);
        $('#data_falecimento_instituidor').val(dadosInstituidores.data_falecimento);

        updateFounder = true;

        $('#modal-show-founder').modal('hide');
        $('#modal-instituidor').modal('show');


    }

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



</script>
@stack('js') @yield('js')
@stop