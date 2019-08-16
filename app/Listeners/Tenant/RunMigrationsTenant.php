<?php

namespace App\Listeners\Tenant;

use App\Events\Tenant\DatabaseCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Artisan;

class RunMigrationsTenant
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DatabaseCreated  $event
     * @return void
     */
    public function handle(DatabaseCreated $event)
    {
        $company = $event->getCompany();

        $migration = Artisan::call('tenants:migrations', [
            'id' => $company->id,
        ]);
        
        // if ($migration === 0) {
        //     Artisan::call('db:seed', [
        //         '--class'   =>  'TenantSeeder',
        //     ]);
        // }

        return $migration === 0;
    }
}
