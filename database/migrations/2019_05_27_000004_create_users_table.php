<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('firstname', 200)->nullable();
            $table->string('name', 200)->nullable();
            $table->string('telephone', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->unsignedInteger('roles_id');

            $table->index(["roles_id"], 'fk_users_roles1_idx');

            $table->unique(["email"], 'email_UNIQUE');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('roles_id', 'fk_users_roles1_idx')
                ->references('id')->on('roles')
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
