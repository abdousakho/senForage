<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'communes';

    /**
     * Run the migrations.
     * @table communes
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
            $table->unsignedInteger('arrondissements_id');

            $table->index(["arrondissements_id"], 'fk_communes_arrondissements1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('arrondissements_id', 'fk_communes_arrondissements1_idx')
                ->references('id')->on('arrondissements')
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
