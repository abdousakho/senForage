<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'agents';

    /**
     * Run the migrations.
     * @table agents
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('matricule', 200);
            $table->unsignedInteger('users_id')->nullable();

            $table->index(["users_id"], 'fk_agents_users1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_agents_users1_idx')
                ->references('id')->on('users')
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
