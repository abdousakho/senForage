<?php

use Illuminate\Database\Seeder;

class AdministrateursTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Administrateur::class,10)->create();
    }
}
