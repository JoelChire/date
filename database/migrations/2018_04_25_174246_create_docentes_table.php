<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) 
        {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');
            $table->string('codigo', 20)->unique();
            $table->string('profesion', 45);
            $table->string('grado', 45);
            $table->string('departamento',80)->nullable();
            $table->boolean('tutor');
            $table->boolean('supertutor');
            $table->integer('persona_id') -> unsigned();
            $table->foreign('persona_id') -> references('id') -> on('personas');

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
        Schema::dropIfExists('docentes');
    }
}
