<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
//use Spatie\Permission\Models\Permission;

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

        return view('client.usuarios.index', compact('users'));
    }

    public function niveisAcesso($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'id');

        return view('client.usuarios.acesso', compact('user', 'roles'));
    }

    public function atribuirFuncao(Request $request)
    {

        $user = User::find($request->user_id);
        $role = Role::find($request->role);

        $user->assignRole($role->name);

        return redirect()->route('users.index')->with('sucess', 'Função atribuida com sucesso');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titleForm = "Novo Usuário";
        $novo = true;

        return view('client.usuarios.form', compact('titleForm', 'novo'));
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

        $user = User::create($dataForm);

        if($user)
            return redirect()->route('users.index')->with('sucess', 'Usuário cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::where('email', auth()->user()->email)->get()->first();
        $user->password = "";

        $titleForm = "Atualizar dados de {$user->name}";

        return view('client.usuarios.form-update', compact('titleForm', 'user'));
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
        $user = User::where('email', auth()->user()->email)->get()->first();

        $update = $user->update($request->all());

        if($update)
            return redirect()->route('meu-perfil')->with('success', 'Usuário atualizado com sucesso');
    }

    public function alterarSenha(Request $request)
    {
        //return dd($request->all());

        $user = User::where('email', auth()->user()->email)->get()->first();

        if (Hash::check($request->password, $user->password)) {

            $user->password = bcrypt($request->new_password);
            $user->save();

            return response()->json('Senha atualizado com sucesso', 200);

        } else {
            return response()->json('Senha atual incorreta', 401);
        }

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
