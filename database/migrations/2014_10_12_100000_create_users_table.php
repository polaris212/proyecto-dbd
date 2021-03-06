<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('apellido')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->boolean('activo')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('id_organizacion')->nullable();
            $table->integer('id_role')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_role')->references('id')->on('roles');
            $table->foreign('id_organizacion')->references('id')->on('organizacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
