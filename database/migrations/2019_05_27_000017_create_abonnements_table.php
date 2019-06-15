<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonnementsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'abonnements';

    /**
     * Run the migrations.
     * @table abonnements
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('details', 200)->nullable();
            $table->unsignedInteger('clients_id');
            $table->unsignedInteger('compteurs_id');

            $table->index(["compteurs_id"], 'fk_abonnements_compteurs1_idx');

            $table->index(["clients_id"], 'fk_abonnements_clients1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('clients_id', 'fk_abonnements_clients1_idx')
                ->references('id')->on('clients')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('compteurs_id', 'fk_abonnements_compteurs1_idx')
                ->references('id')->on('compteurs')
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
