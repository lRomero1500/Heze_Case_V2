<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCotzEmpleadosAddEmailCorporativo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hez_empleados', function (Blueprint $table) {
            $table->string('email_corporativo')->after('email');
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
            $table->dropColumn('email_corporativo');
        });
    }
}
