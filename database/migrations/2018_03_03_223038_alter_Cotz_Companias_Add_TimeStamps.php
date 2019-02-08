<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCotzCompaniasAddTimeStamps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hez-companias',function (Blueprint $table){
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hez-companias',function (Blueprint $table){
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}
