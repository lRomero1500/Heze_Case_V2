<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHezSubServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hez_sub-servicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('servicios_id')->unsigned();
            $table->string('nomb-subservicio');
            $table->integer('tipocost_id')->unsigned();
            $table->string('cost-servicio');
            $table->foreign('servicios_id')->references('id')->on('hez_servicios');
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
        Schema::dropIfExists('hez_sub-servicios');
    }
}
