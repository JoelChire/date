<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEedcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eedcs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');
            $table->integer('valor');
            $table->integer('estudiantedocentecurso_id')-> unsigned();
            $table->foreign('estudiantedocentecurso_id')-> references('id')-> on('estudiantedocentecursos');
            $table->integer('evaluacione_id')-> unsigned();
            $table->foreign('evaluacione_id')-> references('id')-> on('evaluaciones');

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
        Schema::dropIfExists('eedcs');
    }
}
