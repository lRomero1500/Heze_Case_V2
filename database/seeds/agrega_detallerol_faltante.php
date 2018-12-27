<?php

use Illuminate\Database\Seeder;

class agrega_detallerol_faltante extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cotz_detalle_roles')->insert([
            ['cod_Rol' => 1,
                'cod_menu' => 4,
                'permisos' => '1,1,1,1'],
            ['cod_Rol' => 1,
                'cod_menu' => 5,
                'permisos' => '1,1,1,1'],
            ['cod_Rol' => 1,
                'cod_menu' => 6,
                'permisos' => '1,1,1,1'],
            ['cod_Rol' => 1,
                'cod_menu' => 7,
                'permisos' => '1,1,1,1']
        ]);
    }
}
