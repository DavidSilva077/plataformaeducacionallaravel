<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinasTable extends Migration
{
    public function up()
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('professor_id');
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->timestamps();

            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('professor_id')->references('id')->on('professores')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('disciplinas');
    }
}
