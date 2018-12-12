<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCompaniasAddColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cotz-companias',function (Blueprint $table){
            $table->string('direccion_companias');
            $table->binary('logo_companias');
            $table->binary('correo_companias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cotz-companias',function (Blueprint $table){
            $table->dropColumn('direccion_companias');
            $table->dropColumn('logo_companias');
            $table->dropColumn('correo_companias');
        });
    }
}
