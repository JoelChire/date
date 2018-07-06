<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');
            $table->string('nombre', 100);
            $table->string('primerapellido', 50);
            $table->string('segundoapellido', 50) -> nullable();
            $table->string('dni', 10);
            $table->string('direccion', 100);
            $table->datetime('nacimiento');
            $table->string('contacto', 15);
            $table->string('facebook', 100);
            $table->integer('user_id') -> unsigned();
            $table->foreign('user_id') -> references('id') -> on('users');
            $table->integer('sexo_id') -> unsigned();
            $table->foreign('sexo_id') -> references('id') -> on('sexos');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
