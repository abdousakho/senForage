<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrondissementsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'arrondissements';

    /**
     * Run the migrations.
     * @table arrondissements
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('nom', 200)->nullable();
            $table->unsignedInteger('departements_id');

            $table->index(["departements_id"], 'fk_arrondissements_departements1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('departements_id', 'fk_arrondissements_departements1_idx')
                ->references('id')->on('departements')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
