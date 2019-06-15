<?php

use Illuminate\Database\Seeder;

class GestionnairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Gestionnaire::class,10)->create();
    }
}
