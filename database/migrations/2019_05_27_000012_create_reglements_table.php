<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReglementsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'reglements';

    /**
     * Run the migrations.
     * @table reglements
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->dateTime('date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('montant')->nullable();
            $table->unsignedInteger('types_id');
            $table->unsignedInteger('factures_id');
            $table->unsignedInteger('comptables_id');

            $table->index(["factures_id"], 'fk_reglements_factures1_idx');

            $table->index(["types_id"], 'fk_reglements_types1_idx');

            $table->index(["comptables_id"], 'fk_reglements_comptables1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('types_id', 'fk_reglements_types1_idx')
                ->references('id')->on('types')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('factures_id', 'fk_reglements_factures1_idx')
                ->references('id')->on('factures')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('comptables_id', 'fk_reglements_comptables1_idx')
                ->references('id')->on('comptables')
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
