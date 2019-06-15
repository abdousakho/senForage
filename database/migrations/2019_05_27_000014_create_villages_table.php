<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillagesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'villages';

    /**
     * Run the migrations.
     * @table villages
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
            $table->integer('chef_id')->nullable();
            $table->unsignedInteger('communes_id');

            $table->index(["communes_id"], 'fk_villages_communes1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('communes_id', 'fk_villages_communes1_idx')
                ->references('id')->on('communes')
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
