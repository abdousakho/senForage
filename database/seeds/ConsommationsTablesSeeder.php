<?php

use Illuminate\Database\Seeder;

class ConsommationsTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(App\Consommation::class,120)->create(['factures_id'=null]);
    }
}
