<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(AgentsTableSeeder::class);
        $this->call(AdministrateursTableSeeder::class);
        $this->call(GestionnairesTableSeeder::class);
        $this->call(VillagesTableSeeder::class);
        $this->call(ComptablesTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);

    }
}
