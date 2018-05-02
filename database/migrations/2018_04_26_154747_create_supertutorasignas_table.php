<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupertutorasignasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supertutorasignas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');
            $table->string('ciclo', 15) -> unique();
            $table->integer('docente_id1') -> unsigned();
            $table->foreign('docente_id1') -> references('id') -> on('docentes');
            $table->integer('docente_id') -> unsigned(); 
            $table->foreign('docente_id') -> references('id') -> on('docentes');

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
        Schema::dropIfExists('supertutorasignas');
    }
}
