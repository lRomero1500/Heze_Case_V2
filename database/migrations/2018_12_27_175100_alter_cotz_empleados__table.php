<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCotzEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hez_empleados', function (Blueprint $table) {
            $table->bigInteger('departamento_id')->unsigned()->nullable();
            $table->foreign('departamento_id')->references('id')->on('hez_departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hez_empleados', function (Blueprint $table) {
            $table->dropForeign('cotz_empleados_departameto_id_foreign');
            $table->dropColumn('departamento_id');
        });
    }
}
