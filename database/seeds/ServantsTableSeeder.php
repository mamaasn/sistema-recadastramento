<?php

use Illuminate\Database\Seeder;

class ServantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Client\Servant::class, 100)->create();
    }
}
