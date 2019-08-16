<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ $title }}</title>
    <style>
        .table-bordered {
            border: 1px solid #f4f4f4;
        }

        .table {
            width: 100%;
        }

        .table-striped>tbody>tr:nth-of-type(odd) {
            background-color: #C0C0C0;
        }
    </style>
</head>

<body>
    <h1>{{ $title }}</h1>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NOME</th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th>SEXO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($servants as $servant)
                    <tr>
                        <td>{{ $servant->nome }}</td>
                        <td>{{ $servant->cpf }}</td>
                        <td>{{ $servant->numero_rg }}</td>
                        <td>{{ $servant->sexo }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nome</th>
                        <th>Cpf</th>
                        <th>RG</th>
                        <th>SEXO</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>