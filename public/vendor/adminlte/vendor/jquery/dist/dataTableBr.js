$(document).ready(function () {

    $(".list-table").DataTable({
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });
   
});

function initialiseTableServant($url) {

    $('#table-servant').DataTable().clear();
    $('#table-servant').DataTable().destroy();


    $('#table-servant').DataTable({
        processing: true,
        serverSide: true,
        ajax: $url,
        columns: [
            { data: 'registro', name: 'registro' },
            { data: 'matricula', name: 'matricula' },
            { data: 'nome', name: 'nome' },
            { data: 'cpf', name: 'cpf' },
            { data: 'namelink', name: 'namelink' }
        ],
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });
}

function initialiseTableDocument($url) {

    $('#table-documents').DataTable().clear();
    $('#table-documents').DataTable().destroy();


    $('#table-documents').DataTable({
        processing: true,
        serverSide: true,
        ajax: $url,
        columns: [
            { data: 'fileName', name: 'fileName' },
            { data: 'download', name: 'download' },
            { data: 'excluir', name: 'excluir' }
        ],
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });
    $('#table-documents').css('width', '100%');
}

function initialiseTableDependents($url) {

    $('.table-dependents').DataTable().clear();
    $('.table-dependents').DataTable().destroy();


    $('.table-dependents').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: $url,
        columns: [
            { data: 'nome', name: 'nome' },
            { data: 'cpf', name: 'cpf' },
            { data: 'numero_rg', name: 'numero_rg' },
            { data: 'visualizar', name: 'visualizar' },
            { data: 'desassociar', name: 'desassociar' }
        ],
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
    });
    $('.table-dependents').css('width', '100%');
}

function initialiseTableSearchDependents($url) {

    $('.table-search-dependents').DataTable().clear();
    $('.table-search-dependents').DataTable().destroy();


    $('.table-search-dependents').DataTable({
        processing: true,
        serverSide: true,
        ajax: $url,
        columns: [
            { data: 'nome', name: 'nome' },
            { data: 'cpf', name: 'cpf' },
            { data: 'numero_rg', name: 'numero_rg' },
            { data: 'acoes', name: 'acoes' }
            
        ],
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
    });
    $('.table-search-dependents').css('width', '100%');
}

function initialiseTableFounders($url) {

    $('.table-founders').DataTable().clear();
    $('.table-founders').DataTable().destroy();


    $('.table-founders').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: $url,
        columns: [
            { data: 'nome', name: 'nome' },
            { data: 'cpf', name: 'cpf' },
            { data: 'visualizar', name: 'visualizar' },
            { data: 'desassociar', name: 'desassociar' },
        ],
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
    });
    $('.table-founders').css('width', '100%');
}

function initialiseTableSearchFounders($url) {

    $('.table-search-founders').DataTable().clear();
    $('.table-search-founders').DataTable().destroy();

    $('.table-search-founders').DataTable({
        processing: true,
        serverSide: true,
        ajax: $url,
        columns: [
            { data: 'nome', name: 'nome' },
            { data: 'cpf', name: 'cpf' },
            { data: 'data_nascimento', name: 'data_nascimento' },
            { data: 'acoes', name: 'acoes' }
        ],
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
    });
    $('.table-search-founders').css('width', '100%');
}

function initialiseTableTimes($url) {

    $('.table-times').DataTable().clear();
    $('.table-times').DataTable().destroy();

    $('.table-times').DataTable({
        processing: true,
        serverSide: true,
        ajax: $url,
        columns: [
            { data: 'razao_social', name: 'razao_social' },
            { data: 'pivot.data_inicio', name: 'pivot.data_inicio' },
            { data: 'pivot.data_fim', name: 'pivot.data_fim' },
            { data: 'visualizar', name: 'visualizar' },
            { data: 'desassociar', name: 'desassociar' }
        ],
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
    });
    $('.table-times').css('width', '100%');
}

function initialiseTableSearchTimes($url) {

    $('.table-search-times').DataTable().clear();
    $('.table-search-times').DataTable().destroy();

    $('.table-search-times').DataTable({
        processing: true,
        serverSide: true,
        ajax: $url,
        columns: [
            { data: 'razao_social', name: 'razao_social' },
            { data: 'cnpj', name: 'cnpj' },
            { data: 'acoes', name: 'acoes' }
        ],
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
    });
    $('.table-search-times').css('width', '100%');
}


function initialiseTableGetServant($url) {

    $('#table-servant').DataTable().clear();
    $('#table-servant').DataTable().destroy();


    $('#table-servant').DataTable({
        processing: true,
        serverSide: true,
        ajax: $url,
        columns: [
            { data: 'registro', name: 'registro' },
            { data: 'matricula', name: 'matricula' },
            { data: 'nome', name: 'nome' },
            { data: 'cpf', name: 'cpf' }
        ],
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });
    $('#table-servant').css('width', '100%');
}

function initialiseTableGetDependents($url) {

    $('#table-dependents').DataTable().clear();
    $('#table-dependents').DataTable().destroy();


    $('#table-dependents').DataTable({
        processing: true,
        serverSide: true,
        ajax: $url,
        columns: [
            { data: 'nome', name: 'nome' },
            { data: 'cpf', name: 'cpf' }
        ],
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });
    $('#table-dependents').css('width', '100%');
}