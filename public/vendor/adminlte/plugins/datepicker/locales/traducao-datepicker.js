$(document).ready(function () {
    $.fn.datepicker.dates['pt-br'] = {
        days: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
        daysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
        daysMin: ["D", "S", "T", "Q", "Q", "S", "S"],
        months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
        monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        today: "Hoje",
        clear: "Limpar",
        format: "dd/mm/yyyy",
        titleFormat: "MM yyyy", // Leverages same syntax as 'format' /
            weekStart: 0
    };

    $('#data_nascimento').datepicker({
        autoclose: true,
        language: 'pt-br',
        format: 'dd/mm/yyyy'
    });

    $('#data_emissao_rg').datepicker({
        autoclose: true,
        language: 'pt-br',
        format: 'dd/mm/yyyy'
    });

    $('#data_expedicao_cnh').datepicker({
        autoclose: true,
        language: 'pt-br',
        format: 'dd/mm/yyyy'
    });

    $('#data_validade_cnh').datepicker({
        autoclose: true,
        language: 'pt-br',
        format: 'dd/mm/yyyy'
    });

    $('#data_admissao').datepicker({
        autoclose: true,
        language: 'pt-br',
        format: 'dd/mm/yyyy'
    });

    $('#data_concessao_beneficio').datepicker({
        autoclose: true,
        language: 'pt-br',
        format: 'dd/mm/yyyy'
    });

    // $('#data_nascimento_dependente').datepicker({
    //     autoclose: true,
    //     language: 'pt-br',
    //     format: 'dd/mm/yyyy'
    // });

    // $('#data_emissao_rg_dependente').datepicker({
    //     autoclose: true,
    //     language: 'pt-br',
    //     format: 'dd/mm/yyyy'
    // });

    // $('#data_inicio').datepicker({
    //     autoclose: true,
    //     language: 'pt-br',
    //     format: 'dd/mm/yyyy',
    //     todayHighlight: true,
    //     todayBtn: "linked",
    //     container: '#modal-tempo'
    // });

    // $('#data_fim').datepicker({
    //     autoclose: true,
    //     language: 'pt-br',
    //     format: 'dd/mm/yyyy'
    // });

    // $('#data_nascimento_instituidor').datepicker({
    //     autoclose: true,
    //     language: 'pt-br',
    //     format: 'dd/mm/yyyy'
    // });

    // $('#data_falecimento_instituidor').datepicker({
    //     autoclose: true,
    //     language: 'pt-br',
    //     format: 'dd/mm/yyyy'
    // });

});

