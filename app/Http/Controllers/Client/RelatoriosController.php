<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client\Servant;
use Illuminate\Support\Facades\DB;

class RelatoriosController extends Controller
{
    protected $servant;

    public function __construct(Servant $servant)
    {
        $this->servant = $servant;
    }


    public function estatisticas()
    {
        $finalizados = DB::select("SELECT COUNT(id) AS 'quantidade' FROM servants WHERE servants.finalizado = 1 AND servants.parcial = 0");

        $naoFinalizados = DB::select("SELECT COUNT(id) AS 'quantidade' FROM servants WHERE servants.finalizado = 0 AND servants.parcial = 0");

        $parciais = DB::select("SELECT COUNT(id) AS 'quantidade' FROM servants WHERE servants.finalizado = 0 AND servants.parcial = 1");

        return view('client.relatorios.estatisticas', compact('finalizados', 'naoFinalizados', 'parciais'));
    }

    public function pendentes()
    {
        $servants = $this->servant->where([['finalizado', 0], ['parcial', 0]])->get();

        return view('client.relatorios.pendentes', compact('servants'));
    }

    public function pendentesPdf()
    {
        $servants = $this->servant->where([['finalizado', 0], ['parcial', 0]])->get();
        $title = "Servidores Pendentes";

        return \PDF::loadView('client.relatorios.finalizados_pendentes_pdf', compact('servants', 'title'))
            ->setPaper('a4', 'landscape')
            ->stream('servidores-pendentes.pdf');
    }

    public function finalizados(Request $request)
    {
        $dataForm = $request->except('_token');

        $servants = $this->servant->search($dataForm);

       // return dd($dataForm);

        return view('client.relatorios.finalizados', compact('servants'));
    }

    public function finalizadosPdf(Request $request)
    {
        $title = "titulo";
        $servants = json_decode($request->data);

        //return dd($servants);

        return \PDF::loadView('client.relatorios.finalizados_pendentes_pdf', compact('servants', 'title'))
            ->setPaper('a4', 'landscape')
            ->stream('servidores-finalizado.pdf');
    }

    public function parciais()
    {
        $servants = $this->servant->where([['parcial', 1], ['finalizado', 0]])->orderBy('nome')->get();

        return view('client.relatorios.parciais', compact('servants'));
    }

    public function parciaisPdf()
    {
        $servants = $this->servant->where([['parcial', 1], ['finalizado', 0]])->get();

        $title = "Servidores Parciais";

        return \PDF::loadView('client.relatorios.finalizados_pendentes_pdf', compact('servants', 'title'))
            ->setPaper('a4', 'landscape')
            ->stream('servidores-pendentes.pdf');
    }

    public function departamento()
    {
        $orgao = Servant::pluck('orgao', 'id');

        //return dd($orgao);

        return view('client.relatorios.departamento', compact('orgao'));
    }

}
