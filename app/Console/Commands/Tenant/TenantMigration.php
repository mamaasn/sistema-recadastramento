<?php

namespace App\Console\Commands\Tenant;

use App\Models\Company;
use Illuminate\Console\Command;
use App\Tenant\ManagerTenant;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class TenantMigration extends Command
{
    private $managerTenant;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:migrations {id?} {--refresh}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Migrations Tenants';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ManagerTenant $managerTenant)
    {
        $this->managerTenant = $managerTenant;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {        
        if ($id = $this->argument('id')) {

            $company = Company::find($id);

            $this->execCommand($company);

            return;

        } else {

            $companies = Company::all();

            foreach ($companies as $company) {

                $this->execCommand($company);
            }

        }

    }

    public function execCommand($company)
    {

        $command = $this->option('refresh') ? 'migrate:refresh' : 'migrate';

        $this->managerTenant->setConnection($company);

        $this->info("Conectando ao banco de dados  {$company->razao_social}");
        if($command == 'migrate:refresh')
            $this->info("Recriando tabelas");

        $run = Artisan::call($command, [
            '--force'   =>  'true',
            '--path'    =>  '/database/migrations/tenant',
        ]);

        //Gravar log
        Log::info("Run: {$run}");

        if ($run === 0) {
            Artisan::call('db:seed', [
                '--class'   =>  'TenantSeeder',
            ]);
            Log::info("Sucesso ao rodar seeders");
            
            $this->info("Sucesso Migration");
        }
            

        $this->info("Fechando a conexão de {$company->razao_social}");
        $this->info("----------------------------------------------");
    }
}
