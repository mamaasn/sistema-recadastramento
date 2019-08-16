<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client\Logs;

class LogsController extends Controller
{
    public function index()
    {
        $logsServants = Logs::with(['user', 'servant'])->select('user_id', 'servant_id', 'acoes', 'updated_at')->where('servant_id', '<>', NULL)->get();
        $logsDependents = Logs::with(['user', 'dependent'])->select('user_id', 'dependent_id', 'acoes', 'updated_at')->where('dependent_id', '<>', NULL)->get();
        $logsTimes = Logs::with(['user', 'time'])->select('user_id', 'time_id', 'acoes', 'updated_at')->where('time_id', '<>', NULL)->get();
        $logsFounders = Logs::with(['user', 'founder'])->select('user_id', 'founder_id', 'acoes', 'updated_at')->where('founder_id', '<>', NULL)->get();

        //return dd($logsServants);

        return view('client.logs.index', compact('logsServants', 'logsDependents', 'logsTimes', 'logsFounders'));
    }
}
