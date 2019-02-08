<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCotzEmpleadosRenombreEmailDropColumnPasword extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hez_empleados', function (Blueprint $table) {
//            $table->renameColumn('email','email_contacto'); toca hacerlo por otro lado ya que da problemas laravel
            $table->dropColumn('password');
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
//            $table->renameColumn('email_contacto','email'); toca hacerlo por otro lado ya que da problemas laravel
            $table->string('password');
        });
    }
}
