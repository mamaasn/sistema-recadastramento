<?php

namespace App\Console\Commands\Tenant;

use App\Models\Company;
use Illuminate\Console\Command;
use App\Tenant\ManagerTenant;
use Illuminate\Support\Facades\Artisan;

class TenantSeeder extends Command
{
    private $managerTenant;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:seed {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Seeder Tenants';

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

        $this->managerTenant->setConnection($company);

        $this->info("Conectando ao banco de dados  {$company->razao_social}");

        $run = Artisan::call('db:seed', [
            '--class'    =>  'TenantSeeder',
        ]);

        if ($run === 0)
            $this->info("Sucesso Seeder");

        $this->info("Fechando a conexão de {$company->razao_social}");
        $this->info("----------------------------------------------");
    }
}
