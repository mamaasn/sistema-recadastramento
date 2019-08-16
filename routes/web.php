 <?php

use App\Http\Middleware\Tenant\TenantMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

$this->view('/404-tenant', 'errors.404-tenant')->name('404.tenant');
$this->view('/403', 'errors.403')->name('403');
$this->view('/404', 'errors.404')->name('404');
$this->view('/500', 'errors.500')->name('500');
$this->view('/419', 'errors.419')->name('419');

Auth::routes();

$this->middleware('auth')->group(function () {

    $this->get('/', 'HomeController@index')->name('home');

    $this->get('/', 'HomeController@index')->name('home2');

    $this->resource('agendamento', 'Client\AgendamentoController');

    /********************************************************************************************************************************************
     * Recadastramento
     */

    $this->resource('recadastramento', 'Client\RecadastramentoController');

    $this->post('files', 'Client\RecadastramentoController@fileUpload')->name('files');

    $this->get('search-servant/{nome}', 'Client\RecadastramentoController@searchServant')->name('search-servant');

    $this->get('load-files/{registro}', 'Client\RecadastramentoController@loadUploadFilesServant')->name('load-files');

    $this->get('download-file/{id}', 'Client\RecadastramentoController@downloadFile')->name('download-file');

    $this->get('delete-file/{id}', 'Client\RecadastramentoController@deleteFile')->name('delete-file');

    $this->post('save-dependent', 'Client\RecadastramentoController@saveDependent')->name('save-dependent');

    $this->get('load-dependents/{registro}', 'Client\RecadastramentoController@loadDependents')->name('load-dependents');

    $this->get('load-dependent/{id}', 'Client\RecadastramentoController@loadDependent')->name('load-dependent');

    $this->get('search-depedents/{nome}', 'Client\RecadastramentoController@searchDependents')->name('search-depedents');

    $this->get('associate-dependent/{registro}/{dependent_id}/{kinship_id}', 'Client\RecadastramentoController@associateDependent')->name('associate-dependent');

    $this->get('desassociate-dependent/{registro}/{dependent_id}', 'Client\RecadastramentoController@desassociateDependent')->name('desassociate-dependent');

    $this->post('save-founder', 'Client\RecadastramentoController@saveFounder')->name('save-founder');

    $this->get('load-founders/{registro}', 'Client\RecadastramentoController@loadFounders')->name('load-founders');

    $this->get('load-founder/{id}', 'Client\RecadastramentoController@loadFounder')->name('load-founder');

    $this->get('desassociate-founder/{registro}/{founder_id}', 'Client\RecadastramentoController@desassociateFounder')->name('desassociate-founder');

    $this->get('search-founders/{nome}', 'Client\RecadastramentoController@searchFounders')->name('search-founders');

    $this->post('associate-founder', 'Client\RecadastramentoController@associateFounder')->name('associate-founder');

    $this->post('save-time', 'Client\RecadastramentoController@saveTime')->name('save-time');

    $this->get('load-times/{registro}', 'Client\RecadastramentoController@loadTimes')->name('load-times');

    $this->get('desassociate-time/{registro}/{time_id}', 'Client\RecadastramentoController@desassociateTime')->name('desassociate-time');

    $this->get('load-time/{registro}/{time_id}', 'Client\RecadastramentoController@loadTime')->name('load-time');

    $this->get('search-times/{razao_social}', 'Client\RecadastramentoController@searchTimes')->name('search-times');

    $this->get('associate-time/{registro}/{time_id}/{data_inicio}/{data_fim}/{tipo_vinculo}/{tipo_regime_trabalho}/{caracteristicas_especiais}', 'Client\RecadastramentoController@associateTime')->name('associate-time');

    /********************************************************************************************************************************************
     * Importar servidores
     */

    $this->resource('importar-servidores', 'Client\ImportarServidoresController')->middleware('role:Admin');

    $this->get('get-servants', 'Client\ImportarServidoresController@getServants')->name('get-servants')->middleware('role:Admin');

    $this->resource('importar-dependentes', 'Client\ImportarDependentesController')->middleware('role:Admin');

    $this->get('get-dependents', 'Client\ImportarDependentesController@getDependents')->name('get-dependents')->middleware('role:Admin');


    /********************************************************************************************************************************************
     * Usuários
     */

    $this->resource('users', 'Client\UserController')->middleware('role:Admin');

    $this->get('meu-perfil', 'Client\UserController@edit')->name('meu-perfil');

    $this->get('users/{id}/acesso', 'Client\UserController@niveisAcesso')->name('users.acesso')->middleware('role:Admin');

    $this->post('users/acesso', 'Client\UserController@atribuirFuncao')->name('users.acesso-register')->middleware('role:Admin');

    $this->post('alterar-senha', 'Client\UserController@alterarSenha')->name('alterar-senha');

    /********************************************************************************************************************************************
     * Relatórios
     */

    $this->get('relatorios/estatisticas', 'Client\RelatoriosController@estatisticas')->name('relatorios.estatisticas');

    $this->get('relatorios/pendentes', 'Client\RelatoriosController@pendentes')->name('relatorios.pendentes')->middleware('role:Admin|Responsável Legal');
    $this->get('relatorios/pendentes/pdf', 'Client\RelatoriosController@pendentesPdf')->name('relatorios.pendentes.pdf')->middleware('role:Admin|Responsável Legal');

    $this->view('/relatorios/finalizados', 'client.relatorios.finalizados')->name('relatorios.finalizados');
    
    $this->post('relatorios/finalizados', 'Client\RelatoriosController@finalizados')->name('relatorios.finalizados')->middleware('role:Admin|Responsável Legal');

    $this->post('relatorios/finalizados/pdf', 'Client\RelatoriosController@finalizadosPdf')->name('relatorios.finalizados.pdf')->middleware('role:Admin|Responsável Legal');

    //$this->get('relatorios/finalizados/pdf/{bitTable}/{dataInicio}/{dataFim}/{sexo}', 'Client\RelatoriosController@finalizadosPdf')->name('relatorios.finalizados.pdf.data')->middleware('role:Admin|Responsável Legal');

    $this->get('relatorios/parciais', 'Client\RelatoriosController@parciais')->name('relatorios.parciais')->middleware('role:Admin|Responsável Legal');
    $this->get('relatorios/parciais/pdf', 'Client\RelatoriosController@parciaisPdf')->name('relatorios.parciais.pdf')->middleware('role:Admin|Responsável Legal');

    $this->get('relatorios/departamento', 'Client\RelatoriosController@departamento')->name('relatorios.departamento')->middleware('role:Admin|Responsável Legal');

    /********************************************************************************************************************************************
     * Logs
     */

    $this->get('logs', 'Client\LogsController@index')->name('logs.index')->middleware('role:Admin|Responsável Legal');

    $this->get('autocomplete/{search}', 'Client\RecadastramentoController@autoComplete')->name('autocomplete');

});

$this->get('pre-recadastramento', 'Client\RecadastramentoController@preRecadastramento');
$this->post('pre-recadastramento', 'Client\RecadastramentoController@preRecadastramentoLogin')->name('prerecadlogin');
$this->get('agendamento', 'Client\RecadastramentoController@agendamento')->name('agendamento');
$this->post('agendamentoPost', 'Client\RecadastramentoController@agendarPost');

$this->get('preedit/{registro}', 'Client\RecadastramentoController@preEdit')->name('preEdit');
$this->put('preUpdate/{registro}', 'Client\RecadastramentoController@preUpdate')->name('preUpdate');


/********************************************************************************************************************************************
 * Testes
 */

$this->get('/teste', 'Client\ExportarSipController@index')->name('teste');

