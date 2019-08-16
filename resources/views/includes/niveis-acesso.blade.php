@auth
<script>
    @if (Auth::user()->hasRole('Responsável Legal'))
        $('#Administrador').remove();
    @endif

    @if (Auth::user()->hasRole('Recadastrador'))
        $('#Administrador').remove();
        $('#Logs').remove();
        $('#Relatórios').remove();
    @endif
</script>
@endauth