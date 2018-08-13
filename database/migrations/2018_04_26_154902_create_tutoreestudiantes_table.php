<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutoreestudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutoreestudiantes', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->charset = 'utf8mb4';
          $table->collation = 'utf8mb4_unicode_ci';

          $table->increments('id');
          $table->integer('tutore_id') -> unsigned();
          $table->foreign('tutore_id') -> references('id') -> on('docentes');
          $table->integer('estudiante_id') -> unsigned();
          $table->foreign('estudiante_id') -> references('id') -> on('estudiantes');

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
        Schema::dropIfExists('tutoreestudiantes');
    }
}
