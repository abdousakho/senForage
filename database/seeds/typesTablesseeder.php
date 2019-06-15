<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class typestablesseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $type1=App\type::firstOrCreate(["name"=>"Orange Money"],["uuid"=>Str::uuid()]);
        $type2=App\type::firstOrCreate(["name"=>"Cash"],["uuid"=>Str::uuid()]);
        $type3=App\type::firstOrCreate(["name"=>"Wari"],["uuid"=>Str::uuid()]);
        $type4=App\type::firstOrCreate(["name"=>"Cheque"],["uuid"=>Str::uuid()]);
        $type5=App\type::firstOrCreate(["name"=>"Visa"],["uuid"=>Str::uuid()]);
    }
}
