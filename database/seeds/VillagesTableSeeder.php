<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VillagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=\Faker\Factory::create();
        $regions_json=Storage::get("regions.min.json");
        $regions=json_decode($regions_json);
    
        foreach((array)$regions->region as $region){
            //echo "=============region=========".$region->nom."==========".PHP_EOL;
            $region_=App\Region::firstOrCreate(["nom"=>$region->nom]);
            foreach((array)$region->departement as $departement){
                $departement_=App\Departement::firstOrNew(["nom"=>$departement->nom]);
                $region_->departements()->save($departement_);
               // echo "---departement----".$departement->nom." id: ".$departement->attributes->id.PHP_EOL;
                foreach((array)$departement->arrondissement as $arrondissement){
                    $arrondissement_=App\Arrondissement::firstOrNew(["nom"=>$arrondissement->nom]);
                    $departement_->arrondissements()->save($arrondissement_);
                    //echo "-----arrondissement----".$arrondissement->nom." id: ".$arrondissement->attributes->id.PHP_EOL;
                    foreach ((array)$arrondissement->commune as $commune) {
                        //echo "-----commune----".$commune->nom.PHP_EOL;
                        $commune_=App\Commune::firstOrNew(["nom"=>$commune->nom]);
                        $arrondissement_->communes()->save($commune_);
                        foreach ((array)$commune->village as $village) {
                            if(App\Village::count()<25){
                            $village_=App\Village::firstOrNew(["nom"=>$village->nom]);
                            $commune_->villages()->save($village_);

                            $nom_prenom=$village->chef;
                            $arr_nom_prenom=explode(" ",$nom_prenom);
                            $nom=$arr_nom_prenom[count($arr_nom_prenom)-1];
                            $prenom=str_replace($nom,"",$nom_prenom);

                            //echo("Pass 1".PHP_EOL);
                            // $role_gest=App\Role::where("name","Gestionnaire")->first();
                            // $gest_user=App\User::create([
                            //     "name"=>App\Helpers\SnNameGenerator::getName(),
                            //     "firstname"=>App\Helpers\SnNameGenerator::getFirstName(),
                            //     "password"=>bcrypt('secret'),
                            //     "email"=>$faker->randomNumber($nbDigit=3,$strict=true).$faker->safeEmail,
                            //     "telephone"=>$faker->phoneNumber,
                            //     "roles_id"=>$role_gest->id,

                            // ]);
                            // //echo("Pass 2".PHP_EOL);
                            // $gest=App\Gestionnaire::create([
                            //     "matricule"=>"GEST".$faker->randomNumber($nbDigit=5,$strict=true),
                            //     "users_id"=>$gest_user->id
                            // ]);

                            $gestionnaires_id=App\Gestionnaire::get()->pluck('id')->toArray();
                            $randk=array_rand($gestionnaires_id, 1);
                            $id_gest=$gestionnaires_id[$randk];
                            //echo("Pass 3".PHP_EOL);
                            $role_client=App\Role::where("name","Client")->first();
                            $user=App\User::firstOrNew(["name"=>$nom,"firstname"=>$prenom],
                            ["email"=>$faker->randomNumber($nbDigit=3,$strict=true).$faker->safeEmail,
                            "password"=>bcrypt("secret"),
                            "roles_id"=>$role_client->id,
                            "telephone"=>$faker->phoneNumber]);
                            //echo("Pass 4".PHP_EOL);
                            $user->save();
                            
                            $client=App\Client::firstOrNew([
                                "matricule"=>$village->attributes->id
                            ],["village_id"=>$village_->id,"users_id"=>$user->id,"gestionnaires_id"=>$id_gest]);
                            $client->save();
                            $village_->chef_id=$client->id;
                            $village_->save();
                            echo "-----village----".$village->nom."  id:".$village->attributes->id.PHP_EOL;
                            //echo("-----village:chef----".$village->chef.PHP_EOL);
                           // usleep(20000);
                        }else{
                            break 5;
                        }
                    }
                }
            }
        }
    }
    }
}
