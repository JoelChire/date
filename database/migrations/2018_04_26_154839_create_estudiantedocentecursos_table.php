<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantedocentecursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantedocentecursos', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');
            $table->datetime('fecha');
            $table->integer('estudiante_id')-> unsigned();
            $table->foreign('estudiante_id')-> references('id')-> on('estudiantes');
            $table->integer('docentecurso_id')-> unsigned();
            $table->foreign('docentecurso_id')-> references('id')-> on('docentecursos');

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
        Schema::dropIfExists('estudiantedocentecursos');
    }
}
