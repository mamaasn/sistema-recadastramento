<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->getHost() != config('tenant.domain_main')) {
            $finalizados = DB::select("SELECT COUNT(id) AS 'quantidade' FROM servants WHERE servants.finalizado = 1 AND servants.parcial = 0");

            $naoFinalizados = DB::select("SELECT COUNT(id) AS 'quantidade' FROM servants WHERE servants.finalizado = 0 AND servants.parcial = 0");

            $parciais = DB::select("SELECT COUNT(id) AS 'quantidade' FROM servants WHERE servants.finalizado = 0 AND servants.parcial = 1");

            return view('home', compact('finalizados', 'naoFinalizados', 'parciais'));
        }

        return view('home2');

    }
}
