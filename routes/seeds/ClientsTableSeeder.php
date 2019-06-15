<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Gen;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $generator=Gen::create();
        factory(App\Client::class,5)->create()->each(function($client,$key) use($generator){
            $id_compteur=factory(App\Compteur::class)->create()->id;
            $id_abonnemnt=factory(App\Abonnement::class)->create(["clients_id"=>$client->id,"compteurs_id"=>$id_compteur])->id;
            $facture=factory(App\Facture::class,5)->create()->each(function($facture,$k) use($id_compteur){
                factory(App\Consommation::class,10)->create(["compteurs_id"=>$id_compteur,"factures_id"=>$facture->id]);
                factory(App\Reglement::class,10)->create(["factures_id"=>$facture->id,"montant"=>$facture->montant]);
            });
        });
    }
}
