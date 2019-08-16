<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client\MartialStatus;
use App\Models\Client\Nationality;
use App\Models\Client\Instruction;
use App\Models\Client\PublicPlace;
use App\Models\Client\Race;
use App\Models\Client\PhysicalDisability;
use App\Models\Client\Servant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Models\Client\Document;
use App\Models\Client\Kinship;
use App\Models\Client\Dependent;
use App\Models\Client\Founder;
use App\Models\Client\Time;
use Illuminate\Support\Facades\Log;
use App\Models\Client\Logs;

class RecadastramentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.recadastramento.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return redirect()->back()->with('error', 'Você não está autorizado a acessar esta página');

        $maritalStatus = MartialStatus::pluck('nome', 'id');
        $nationalities = Nationality::pluck('nome', 'id');
        $instructions = Instruction::pluck('nome', 'id');
        $publicPlaces = PublicPlace::pluck('nome', 'id');
        $races = Race::pluck('nome', 'id');
        $physicalDisabilities = PhysicalDisability::pluck('nome', 'id');
        $kinships = Kinship::pluck('nome', 'id');

        return view('client.recadastramento.form', compact('kinships', 'maritalStatus', 'nationalities', 'instructions', 'publicPlaces', 'races', 'physicalDisabilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $registro
     * @return \Illuminate\Http\Response
     */
    public function show($registro)
    {
        $servant = Servant::where('registro', $registro)->get();
        return dd($servant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit($registro)
    {
        $servant = Servant::where('registro', $registro)->get()->first();

        //  return dd($servant->parcial);

        $maritalStatus = MartialStatus::pluck('nome', 'id');
        $nationalities = Nationality::pluck('nome', 'id');
        $instructions = Instruction::pluck('nome', 'id');
        $publicPlaces = PublicPlace::pluck('nome', 'id');
        $races = Race::pluck('nome', 'id');
        $physicalDisabilities = PhysicalDisability::pluck('nome', 'id');
        $kinships = Kinship::pluck('nome', 'id');

        return view('client.recadastramento.form', compact('kinships', 'servant', 'maritalStatus', 'nationalities', 'instructions', 'publicPlaces', 'races', 'physicalDisabilities'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  srting  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $registro)
    {
        $servant = Servant::where('registro', $registro)->get()->first();
        $dataForm = $request->all();
        if (!isset($dataForm['tipo_beneficio']))
            $dataForm['tipo_beneficio'] = '';

        // return dd($dataForm);


        $acoes = "Salvou parcialmente";
        $mensagem = "recadastrado parcialmente!";

        if ($dataForm['finalizado'] === "true") {
            $this->validation($request);
            $dataForm['finalizado'] = true;
            $dataForm['parcial'] = false;
            $acoes = "Finalizou";
            $mensagem = "finalizado com sucesso!";
        } else {
            $dataForm['finalizado'] = false;
            $dataForm['parcial'] = true;
        }

        $dataForm['documento_entregue_rg'] = isset($dataForm['documento_entregue_rg']) ? true : false;
        $dataForm['documento_entregue_cpf'] = isset($dataForm['documento_entregue_cpf']) ? true : false;
        //$dataForm['documento_entregue_certidao_casamento'] = isset($dataForm['documento_entregue_certidao_casamento']) ? true : false;
        $dataForm['documento_entregue_ctps'] = isset($dataForm['documento_entregue_ctps']) ? true : false;
        $dataForm['documento_entregue_foto'] = isset($dataForm['documento_entregue_foto']) ? true : false;
        $dataForm['documento_entregue_certidao_nascimento'] = isset($dataForm['documento_entregue_certidao_nascimento']) ? true : false;
        $dataForm['documento_entregue_ctc_inss'] = isset($dataForm['documento_entregue_ctc_inss']) ? true : false;
        $dataForm['documento_entregue_ctc_regime_proprio'] = isset($dataForm['documento_entregue_ctc_regime_proprio']) ? true : false;

        if (isset($dataForm['foto'])) {
            $fileName = 'foto' . '.png';
            $path = "{$servant->registro} - {$servant->nome}";
            $file_path = $path . "/" . $fileName;
            $img = $dataForm['foto'];
            $image_parts = explode(';base64,', $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            Storage::put($file_path, $image_base64);
            $dataForm['foto'] = $file_path;
        } else if (isset($dataForm['fotos2'])) {
            $extension = $dataForm['fotos2']->extension();
            $fileName = 'foto.' . $extension;
            $path = "{$servant->registro} - {$servant->nome}";
            $file_path = $path . "/" . $fileName;
            $upload = $dataForm['fotos2']->storeAs($path, $fileName);
            $dataForm['foto'] = $file_path;
            if (!$upload)
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
        }

        $update = $servant->update($dataForm);

        if ($update) {
            if (isset($dataForm['preEdit'])) {
                Logs::create([
                    'servant_id' => $servant->id,
                    'acoes' => "Recadastrado pelo próprio servidor"
                ]);
                return redirect()
                    ->back()
                    ->with('success', "{$mensagem}");
            } else {
                Logs::create([
                    'user_id' => auth()->user()->id,
                    'servant_id' => $servant->id,
                    'acoes' => $acoes
                ]);
            }

            if (!$dataForm['finalizado'])
                return redirect()
                    ->route('recadastramento.index')
                    ->with('info', "{$servant->nome} {$mensagem}");

            return redirect()
                ->route('recadastramento.index')
                ->with('success', "{$servant->nome} {$mensagem}");
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

    /**
     * Store upload files in database and storage
     * @param Request $request
     * 
     */
    public function fileUpload(Request $request)
    {
        $servant = Servant::where('registro', $request->registro)->get()->first();
        $path = "{$servant->registro} - {$servant->nome}";

        foreach ($request->arquivos as $arquivo) {

            //return dd($arquivo->extension());

            if ($arquivo->extension() != 'pdf')
                return response()->json('O arquivo deve ser do formato PDF', 422);

            $fileName = $arquivo->getClientOriginalName();

            $document = Document::where([
                ['path', $path],
                ['fileName', $fileName]
            ])->get();

            if (!$document->isEmpty())
                return response()->json("Arquivo com o mesmo nome existente!", 422);

            $arquivo->storeAs($path, $fileName);
            Document::create([
                'path' => $path,
                'fileName' => $fileName,
                'servant_id' => $servant->id
            ]);
        }
    }

    /**
     * Load the upload files for the servant request
     * @param String $registro
     */
    public function loadUploadFilesServant($registro)
    {
        $servant = Servant::where('registro', $registro)->get()->first();
        $documents = $servant->documents;

        return datatables()
            ->of($documents)
            ->editColumn('download', function ($documents) {
                return '<a href="' . route('download-file', $documents->id) . '">' . '<span class="label label-success">Download</span>' . '</a>';
            })
            ->editColumn('excluir', function ($documents) {
                return '<a href="#">' . '<span data-nameFile="' . $documents->fileName . '" data-fileId="' . $documents->id . '" data-toggle="modal" data-target="#deleteFileModal" class="label label-danger">Excluir</span>' . '</a>';
            })
            ->rawColumns(['download', 'excluir'])
            ->toJson();
    }

    /**
     * Download request file
     * @param Integer $id
     */
    public function downloadFile($id)
    {
        $file = Document::find($id);

        $storagePath = storage_path() . '/app/public/tenants/' . session('company')['uuid'] . '/' . $file->path;



        return response()->download($storagePath . '/' . $file->fileName);
    }

    /**
     * Delete request file
     * @param Integer $id
     */
    public function deleteFile($id)
    {
        $file = Document::find($id);

        $storagePath = storage_path() . '/app/public/tenants/' . session('company')['uuid'] . '/' . $file->path;

        unlink($storagePath . '/' . $file->fileName);

        $file->delete();

        return redirect()->back()->with('success', 'Arquivo deletado com sucesso');
    }

    /**
     * Search the servant by the name
     * @param string $name
     * 
     */
    public function searchServant($name)
    {
        $result = Servant::where([['nome', 'like', "{$name}%"], ['finalizado', 0]])->get();

        return datatables()
            ->of($result)
            ->editColumn('namelink', function ($result) {
                return '<a href="' . route('recadastramento.edit', $result->registro) . '">' . '<i class="fas fa-edit" title="Recadastrar"></i>' . '</a>';
            })
            ->rawColumns(['namelink'])
            ->toJson();
    }
    /****************************************************************************************************************
     *  Depedentes
     */

    /**
     * Save the request Dependent
     * @param Request $request
     */
    public function saveDependent(Request $request)
    {
        $servant = Servant::where('registro', $request->registro)->get()->first();

        if ($request->atualizar === "true") {
            $findDependent = Dependent::find($request->id);
            $updateDependent = $findDependent->update($request->all());
            $updatePivotDependent = $servant->dependent_servant()->updateExistingPivot($findDependent, ['kinship_id' => $request->kinship_id]);
            Logs::create([
                'user_id' => auth()->user()->id,
                'dependent_id' => $request->id,
                'acoes' => 'Atualizou dependente'
            ]);
            return response()->json('Atualizado com sucesso', 200);
        }

        if ($this->removeMask($request->cpf) != "") {
            $cpf = Dependent::where('cpf', $this->removeMask($request->cpf))->get();
            if (!$cpf->isEmpty())
                return response()->json('CPF existente!', 422);
        }

        $dependent = Dependent::create($request->all());

        $servant->dependent_servant()->attach($dependent, ['kinship_id' => $request->kinship_id]);

        Logs::create([
            'user_id' => auth()->user()->id,
            'dependent_id' => $dependent->id,
            'acoes' => 'Cadastrou dependente'
        ]);
    }

    /**
     *Load the dependents for the servant request
     * @param String $registro
     */
    public function loadDependents($registro)
    {
        $servant = Servant::where('registro', $registro)->get()->first();

        $result = $servant->dependent_servant()->get();

        return datatables()
            ->of($result)
            ->editColumn('visualizar', function ($result) {
                return '<a href="#">' . '<span data-dependent_id="' . $result->id . '" data-toggle="modal" data-target="#modal-show-dependente">Visualizar</span>' . '</a>';
            })
            ->editColumn('desassociar', function ($result) {
                return '<a href="#" onclick="desassociateDependent(this)" data-dependent_id="' . $result->id . '" data-nome="' . $result->nome . '" >' . '<span>Desvincular do servidor</span>' . '</a>';
            })
            ->rawColumns(['visualizar', 'desassociar'])
            ->toJson();
    }


    /**
     *Load the dependent for the id request
     * @param Integer $id
     */
    public function loadDependent($id)
    {
        $result = DB::select("SELECT dependents.*, kinships.id as 'kinship_id', kinships.nome as 'parentesco' FROM dependents INNER JOIN dependent_servant ON dependents.id = dependent_servant.dependent_id INNER JOIN kinships ON dependent_servant.kinship_id = kinships.id WHERE dependent_servant.dependent_id = {$id}");

        return response()->json($result);
    }

    public function searchDependents($name)
    {
        $result = Dependent::where('nome', 'like', "{$name}%")->get();

        return datatables()
            ->of($result)
            ->editColumn('acoes', function ($result) {
                return '<button onclick="associateServant(this)" data-dependent_id="' . $result->id . '" type="button" class="btn btn-primary">' . 'Vincular ao servidor' . '</button>';
            })
            ->rawColumns(['acoes'])
            ->toJson();
    }

    public function associateDependent($registro, $dependent_id, $kinship_id)
    {
        $servant = Servant::where('registro', $registro)->get()->first();

        $dependent = Dependent::find($dependent_id);

        $result = DB::table('dependent_servant')
            ->select()
            ->where([['servant_id', $servant->id], ['dependent_id', $dependent->id]])
            ->get();

        if (!$result->isEmpty())
            return response()->json('Dependente associado!', 422);

        $servant->dependent_servant()->attach($dependent, ['kinship_id' => $kinship_id]);
    }

    public function desassociateDependent($registro, $dependent_id)
    {
        $servant = Servant::where('registro', $registro)->get()->first();

        $dependent = Dependent::find($dependent_id);

        $servant->dependent_servant()->detach($dependent);
    }

    /****************************************************************************************************************
     *  Insitutidores
     */

    public function saveFounder(Request $request)
    {
        $servant = Servant::where('registro', $request->registro)->get()->first();

        if ($request->atualizar === "true") {
            $founder = Founder::find($request->id);
            $founder->update($request->all());
            Logs::create([
                'user_id' => auth()->user()->id,
                'founder_id' => $request->id,
                'acoes' => 'Atualizou instituidor'
            ]);
            return response()->json('Atualizado com sucesso', 200);
        }

        $cpf = Founder::where('cpf', $this->removeMask($request->cpf))->get();

        if (!$cpf->isEmpty())
            return response()->json('CPF existente!', 422);

        $founder = Founder::create($request->all());

        $servant->founder_servant()->attach($founder);

        Logs::create([
            'user_id' => auth()->user()->id,
            'founder_id' => $founder->id,
            'acoes' => 'Cadastrou instituidor'
        ]);
    }

    public function loadFounders($registro)
    {
        $servant = Servant::where('registro', $registro)->get()->first();

        $result = $servant->founder_servant()->get();

        return datatables()
            ->of($result)
            ->editColumn('visualizar', function ($result) {
                return '<a href="#">' . '<span data-founder_id="' . $result->id . '" data-toggle="modal" data-target="#modal-show-founder">Visualizar</span>' . '</a>';
            })
            ->editColumn('desassociar', function ($result) {
                return '<a onclick="desassociateFounder(this)" data-nome="' . $result->nome . '" data-founder_id="' . $result->id . '" href="#">' . '<span>Desvincular do servidor</span>' . '</a>';
            })
            ->rawColumns(['visualizar', 'desassociar'])
            ->toJson();
    }

    public function desassociateFounder($registro, $founder_id)
    {
        $servant = Servant::where('registro', $registro)->get()->first();

        $founder = Founder::find($founder_id);

        $servant->founder_servant()->detach($founder);
    }

    public function loadFounder($id)
    {
        $founder = Founder::with('nationality')->find($id);

        return response()->json($founder);
    }

    public function searchFounders($name)
    {
        $result = Founder::where('nome', 'like', "{$name}%")->get();

        return datatables()
            ->of($result)
            ->editColumn('acoes', function ($result) {
                return '<button type="button" onclick="associateFounder(' . $result->id . ')" class="btn btn-primary">' . 'Vincular ao servidor' . '</button>';
            })
            ->rawColumns(['acoes'])
            ->toJson();
    }

    public function associateFounder(Request $request)
    {
        $servant = Servant::where('registro', $request->registro)->get()->first();

        $founder = Founder::find($request->id);

        $result = DB::table('founder_servant')
            ->select()
            ->where([['servant_id', $servant->id], ['founder_id', $founder->id]])
            ->get();

        if (!$result->isEmpty())
            return response()->json('Instituidor associado!', 422);

        $servant->founder_servant()->attach($founder);
    }

    /****************************************************************************************************************
     *  Insitutidores
     */
    public function saveTime(Request $request)
    {
        $servant = Servant::where('registro', $request->registro)->get()->first();

        if ($request->atualizar === "true") {
            $findTime = Time::find($request->id);
            $updateTime = $findTime->update($request->all());
            $updatePivotTime = $servant->servant_time()->updateExistingPivot($findTime->id, ['data_inicio' => date('Y-m-d', strtotime(str_replace('/', '-', $request->data_inicio))), 'data_fim' => date('Y-m-d', strtotime(str_replace('/', '-', $request->data_fim))), 'tipo_vinculo' => $request->tipo_vinculo, 'tipo_regime_trabalho' => $request->tipo_regime_trabalho, 'caracteristicas_especiais' => $request->caracteristicas_especiais]);
            Logs::create([
                'user_id' => auth()->user()->id,
                'time_id' => $request->id,
                'acoes' => 'Atualizou tempo anterior'
            ]);
            return response()->json('Atualizado com sucesso', 200);
        }

        $time = Time::create($request->all());

        $servant->servant_time()->attach($time, ['data_inicio' => date('Y-m-d', strtotime(str_replace('/', '-', $request->data_inicio))), 'data_fim' => date('Y-m-d', strtotime(str_replace('/', '-', $request->data_fim))), 'tipo_vinculo' => $request->tipo_vinculo, 'tipo_regime_trabalho' => $request->tipo_regime_trabalho, 'caracteristicas_especiais' => $request->caracteristicas_especiais]);

        Logs::create([
            'user_id' => auth()->user()->id,
            'time_id' => $time->id,
            'acoes' => 'Cadastrou tempo anterior'
        ]);
    }

    public function loadTimes($registro)
    {
        $servant = Servant::where('registro', $registro)->get()->first();

        $results = $servant->servant_time()->get();

        foreach ($results as $result) {
            $result->pivot->data_inicio = date('d/m/Y', strtotime($result->pivot->data_inicio));
            $result->pivot->data_fim = date('d/m/Y', strtotime($result->pivot->data_fim));
        }

        return datatables()
            ->of($results)
            ->editColumn('visualizar', function ($result) {
                return '<a href="#">' . '<span data-time_id="' . $result->id . '" data-toggle="modal" data-target="#modal-show-time">Visualizar</span>' . '</a>';
            })
            ->editColumn('desassociar', function ($result) {
                return '<a onclick="desassociateTime(this)" data-razao_social="' . $result->razao_social . '" data-time_id="' . $result->id . '" href="#">' . '<span>Desvincular do servidor</span>' . '</a>';
            })
            ->rawColumns(['visualizar', 'desassociar'])
            ->toJson();
    }

    public function desassociateTime($registro, $time_id)
    {
        $servant = Servant::where('registro', $registro)->get()->first();

        $time = Time::find($time_id);

        $servant->servant_time()->detach($time);
    }

    public function loadTime($registro, $time_id)
    {
        $servant = Servant::where('registro', $registro)->get()->first();

        $result = $servant->servant_time()->where('time_id', $time_id)->get()->first();

        $result->pivot->data_inicio = date('d/m/Y', strtotime($result->pivot->data_inicio));
        $result->pivot->data_fim = date('d/m/Y', strtotime($result->pivot->data_fim));

        return response()->json($result);
    }

    public function searchTimes($razao_social)
    {
        $result = Time::where('razao_social', 'like', "{$razao_social}%")->get();

        return datatables()
            ->of($result)
            ->editColumn('acoes', function ($result) {
                return '<button onclick="associateTime(this)" data-razao_social="' . $result->razao_social . '" data-time_id="' . $result->id . '" type="button" class="btn btn-primary">' . 'Vincular ao servidor' . '</button>';
            })
            ->rawColumns(['acoes'])
            ->toJson();
    }

    public function associateTime($registro, $time_id, $data_inicio, $data_fim, $tipo_vinculo, $tipo_regime_trabalho, $caracteristicas_especiais)
    {

        $servant = Servant::where('registro', $registro)->get()->first();

        $time = Time::find($time_id);

        $caracteristicas_especiais == "ExposicaoAgenteNocivo" ? "Exposição Agente/Nocivo" : $caracteristicas_especiais;

        $result = DB::table('servant_time')
            ->select()
            ->where([['servant_id', $servant->id], ['time_id', $time->id], ['data_inicio', date('Y-m-d', strtotime(str_replace('/', '-', $data_inicio)))], ['data_fim', date('Y-m-d', strtotime(str_replace('/', '-', $data_fim)))]])
            ->get();

        if (!$result->isEmpty())
            return response()->json('Empresa associada!', 422);

        $servant->servant_time()->attach($time, ['data_inicio' => date('Y-m-d', strtotime(str_replace('/', '-', $data_inicio))), 'data_fim' => date('Y-m-d', strtotime(str_replace('/', '-', $data_fim))), 'tipo_vinculo' => $tipo_vinculo, 'tipo_regime_trabalho' => $tipo_regime_trabalho, 'caracteristicas_especiais' => $caracteristicas_especiais]);
    }


    /****************************************************************************************
     * Remove Mask
     */
    public function removeMask($value)
    {
        $value = trim($value);
        $value = str_replace(".", "", $value);
        $value = str_replace(",", "", $value);
        $value = str_replace("-", "", $value);
        $value = str_replace("/", "", $value);
        $value = str_replace("(", "", $value);
        $value = str_replace(")", "", $value);
        $value = str_replace(" ", "", $value);

        return $value;
    }

    public function validation($request)
    {
        $request->validate([
            'nome'                                                  => 'required',
            'sexo'                                                  => 'required',
            'cpf'                                                   => 'required',
            'data_nascimento'                                       => 'required',
            'uf_nascimento'                                         => 'required',
            'cidade_nascimento'                                     => 'required',
            'registro_nascimento'                                   => 'required',
            'necessidades_especiais'                                => 'required',
            'numero_rg'                                             => 'required',
            'orgao_rg'                                              => 'required',
            'uf_rg'                                                 => 'required',
            'data_emissao_rg'                                       => 'required',
            'numero_titulo'                                         => 'required',
            'zona_titulo'                                           => 'required',
            'secao_titulo'                                          => 'required',
            'uf_titulo'                                             => 'required',
            'numero_ctps'                                           => 'required',
            'serie_ctps'                                            => 'required',
            'uf_ctps'                                               => 'required',
            'data_emissao_ctps'                                     => 'required',
            'pis'                                                   => 'required',
            'cep'                                                   => 'required',
            'logradouro'                                            => 'required',
            'bairro'                                                => 'required',
            'numero'                                                => 'required',
            'uf_endereco'                                           => 'required',
            'cidade'                                                => 'required',
            'cidade_codigo_ibge'                                    => 'required',
            'nationality_id'                                        => 'required',
            'martial_status_id'                                     => 'required',
            'instruction_id'                                        => 'required',
            'physical_disability_id'                                => 'required',
            'race_id'                                               => 'required',
            'public_place_id'                                       => 'required',
            'documento_entregue_rg'                                 => 'required',
            'documento_entregue_cpf'                                => 'required',
            //'documento_entregue_certidao_casamento'                 => 'required',
            'documento_entregue_ctps'                               => 'required',
            'documento_entregue_foto'                               => 'required',
            'documento_entregue_certidao_nascimento'                => 'required',
            'tipo_declarante'                                       => 'required',
        ]);
    }

    public function autoComplete($search)
    {
        $servantsName = Servant::select('nome')->where('nome', 'LIKE', "{$search}%")->get();
        return response()->json($servantsName);
    }

    public function preRecadastramento()
    {
        return view('prerecadastramento.login');
    }

    public function preRecadastramentoLogin(Request $request)
    {
        $servants = Servant::where([
            ['cpf', $this->removeMask($request->cpf)], ['data_nascimento', $request->data_nascimento]
        ])->get();

        if ($servants->count() == 0)
            return redirect()->back()->with('error', 'Servidor não encontrado');

        return view('prerecadastramento.index', compact('servants'));
    }

    public function agendamento(Request $request)
    {
        $servant = Servant::with('appointment')->where('matricula', $request->matricula)->get()->first();

        //dd($servant);
        return view('prerecadastramento.agendamento', compact('servant'));
    }

    public function agendarPost(Request $request)
    {
        $servant = Servant::find($request->servant_id);

        $appointment = $servant->appointment()->create($request->all());
        $appointment->protocolo = date('YmdHis') + substr(rand(), 0, 3);
        $appointment->save();

        return response()->json($appointment);
    }

    public function preEdit($registro)
    {
        $servant = Servant::where('registro', $registro)->get()->first();

        $maritalStatus = MartialStatus::pluck('nome', 'id');
        $nationalities = Nationality::pluck('nome', 'id');
        $instructions = Instruction::pluck('nome', 'id');
        $publicPlaces = PublicPlace::pluck('nome', 'id');
        $races = Race::pluck('nome', 'id');
        $physicalDisabilities = PhysicalDisability::pluck('nome', 'id');
        $kinships = Kinship::pluck('nome', 'id');

        return view('prerecadastramento.preedit', compact('kinships', 'servant', 'maritalStatus', 'nationalities', 'instructions', 'publicPlaces', 'races', 'physicalDisabilities'));
    }


    public function preUpdate(Request $request, $registro)
    {
        $servant = Servant::where('registro', $registro)->get()->first();
        $dataForm = $request->all();
        $dataForm['finalizado'] = 0;
        $dataForm['parcial'] = 1;
        //return dd($dataForm);

        $mensagem = "recadastrado parcialmente!";

        $update = $servant->update($dataForm);

        if ($update) {

            Logs::create([
                'servant_id' => $servant->id,
                'acoes' => "Recadastrado pelo próprio servidor"
            ]);
            return redirect()
                ->back()
                ->with('success', "{$mensagem}");
        }
    }
}
