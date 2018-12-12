<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotz_roles',function (Blueprint $table){
            $table->bigIncrements('cod_Rol');
            $table->string('nom_Rol');
            $table->bigInteger('cod_Companias')->unsigned();
            $table->foreign('cod_Companias')->references('cod_Companias')->on('Cotz-Companias');
        });
        Schema::create('cotz_menu',function (Blueprint $table){
            $table->bigIncrements('cod_menu');
            $table->string('nom_menu');
            $table->string('url_menu');
            $table->string('cod_seg');
            $table->bigInteger('cod_menu_padre');
            $table->string('url_icono');
            $table->boolean('activo');
        });
        Schema::create('cotz_detalle_roles',function ( Blueprint $table){
            $table->bigIncrements('cod_Detale_Rol');
            $table->bigInteger('cod_Rol')->unsigned();
            $table->foreign('cod_Rol')->references('cod_Rol')->on('cotz_roles');
            $table->bigInteger('cod_menu')->unsigned();
            $table->foreign('cod_menu')->references('cod_menu')->on('cotz_menu');
            $table->string('permisos');

        });
        Schema::create('cotz_usuarios',function (Blueprint $table){
           $table->bigIncrements('id_Usuarios');
           $table->bigInteger('cod_Empleado')->unsigned();
           $table->foreign('cod_Empleado')->references('cod_Empleado')->on('cotz_empleados');
           $table->string('password');
           $table->string('email')->unique();
           $table->bigInteger('cod_Rol')->unsigned();
           $table->foreign('cod_Rol')->references('cod_Rol')->on('cotz_roles');
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
        Schema::drop('cotz_usuarios');
        Schema::drop('cotz_detalle_roles');
        Schema::drop('cotz_menu');
        Schema::drop('cotz_roles');

    }
}
