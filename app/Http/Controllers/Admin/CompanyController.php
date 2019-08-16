<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Address;
use App\Http\Requests\Tenant\CompanyRequest;
use App\Events\Tenant\CompanyCreated;

class CompanyController extends Controller
{

    private $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->company->all();

        return view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titleForm = "Novo Orgão / Entidade";

        return view('admin.company.form', compact('titleForm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $address = Address::create($request->all());

        $insert = $address->company()->create($request->all());

        // $insert = Company::create($request->all());
        // $address = $insert->address()->create($request->all());

        event(new CompanyCreated($insert));

        if($insert){
            $message = "Sucesso ao cadastrar Orgão/Entidade {$request->razao_social}!";
            return redirect()
                        ->route('entidades.index')
                        ->with('success', $message);
        }

        $message = "Erro ao cadastrar Orgão/Entidade!";
        return redirect()
                    ->back()
                    ->with('error', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($razao_social)
    {
        $company = $this->company->where('razao_social', $razao_social)->first();

        return view('admin.company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($razao_social)
    {
        $company = $this->company->where('razao_social', $razao_social)->first();
        $titleForm = "Atualizando dados de {$company->razao_social}";

        return view('admin.company.form', compact('company', 'titleForm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $cep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cep)
    {
        $address = Address::where('cep', $cep)->first();

        $updateAddress = $address->update($request->all());
        $updateCompany = $address->company->update($request->all());

        if($updateAddress && $updateCompany){
            $message = "Sucesso ao atualizar Orgão/Entidade {$request->nome_fantasia}!";
            return redirect()
                        ->route('entidades.index')
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
