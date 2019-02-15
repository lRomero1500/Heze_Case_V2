<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHezServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hez_servicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cod_Companias')->unsigned();
            $table->string('nomb-servicio');
            $table->integer('tipocost_id')->unsigned();
            $table->string('cost-servicio');
            $table->foreign('cod_Companias')->references('cod_Companias')->on('hez_companias');
            $table->foreign('tipocost_id')->references('id')->on('hez_tipocost');
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
        Schema::dropIfExists('hez_servicios');
    }
}
