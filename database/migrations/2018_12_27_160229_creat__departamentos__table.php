<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotz_departamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('departamento');
            $table->bigInteger('cod_Companias')->unsigned();
            $table->foreign('cod_Companias')->references('cod_Companias')->on('Cotz-Companias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotz_departamentos');
    }
}
