<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'factures';

    /**
     * Run the migrations.
     * @table factures
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->dateTime('date_limite')->nullable();
            $table->string('details', 200)->nullable();
            $table->decimal('montant')->nullable();
            $table->dateTime('debut_consommation')->nullable();
            $table->dateTime('fin_consommation')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
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
