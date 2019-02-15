<?php

use Illuminate\Database\Seeder;

class agrega_tipos_costo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hez_tipocost')->insert([
            ['nomb-tipocost'=>'N/A'],
            ['nomb-tipocost'=>'horas'],
            ['nomb-tipocost'=>'total']
        ]);
    }
}
