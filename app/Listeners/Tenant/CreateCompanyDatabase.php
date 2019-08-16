<?php

namespace App\Listeners\Tenant;

use App\Events\Tenant\CompanyCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Tenant\Database\DatabaseManager;
use App\Events\Tenant\DatabaseCreated;

class CreateCompanyDatabase
{
    private $databaseManager;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    /**
     * Handle the event.
     *
     * @param  CompanyCreated  $event
     * @return void
     */
    public function handle(CompanyCreated $event)
    {
        $company = $event->getCompany();

        if (!$this->databaseManager->createDatabase($company)) {
            throw new \Exception('Erro ao criar banco de dados');
        }

        // run tenants migrations

        event(new DatabaseCreated($company));
    }
}
