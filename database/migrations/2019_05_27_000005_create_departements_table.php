<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartementsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'departements';

    /**
     * Run the migrations.
     * @table departements
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
            $table->unsignedInteger('regions_id');

            $table->index(["regions_id"], 'fk_departements_regions1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('regions_id', 'fk_departements_regions1_idx')
                ->references('id')->on('regions')
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
