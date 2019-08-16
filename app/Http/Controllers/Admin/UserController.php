<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titleForm = "Cadastro de Usuário";
        return view('admin.user.form', compact('titleForm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $request->all();

        $dataForm['password'] = bcrypt($dataForm['password']);

        $insert = User::create($dataForm);

        if($insert){
            $message = "Sucesso ao cadastrar o usuário {$request->name}!";
            return redirect()
                        ->route('usuarios.index')
                        ->with('success', $message);
        }

        $message = "Erro ao cadastrar Usuário!";
        return redirect()
                    ->back()
                    ->with('error', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $email
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        $user = User::where('email', $email)->first();

        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $email
     * @return \Illuminate\Http\Response
     */
    public function edit($email)
    {
        $user = User::where('email', $email)->first();
        $titleForm = "Atualizando dados de {$user->email}";

        return view('admin.user.form', compact('user', 'titleForm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email)
    {
        
        $user = User::where('email', $email)->first();

        $updateUser = $user->update($request->all());

        if($updateUser){
            $message = "Sucesso ao atualizar Orgão/Entidade {$request->name}!";
            return redirect()
                        ->route('usuarios.index')
                        ->with('success', $message);
        }

        $message = "Erro ao atualizar Orgão/Entidade!";
        return redirect()
                    ->back()
                    ->with('error', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
