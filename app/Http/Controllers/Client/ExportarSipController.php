<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client\Servant;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ServantsExport;
use App\Models\Client\Nationality;
use App\Models\User;

class ExportarSipController extends Controller
{
    public function index()
    {

        return dd('teste');

        // $user = User::find(1);
        // $user->update([
        //     'password' => bcrypt('123456')
        // ]);

        //$nacionalidade = Nationality::find(1);

        //return dd($nacionalidade->servants);

        //return Excel::download(new ServantsExport, 'servidores.xlsx');

        //exec('"C:\Users\Matheus\Desktop\driver leitor\sdk\example\Delphi\Bin\SCVBio.exe"');


        //$servants = Servant::with('instruction')->get()->first();

        //return dd($servants);
    }
}
