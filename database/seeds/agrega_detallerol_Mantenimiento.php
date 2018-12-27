<?php

use Illuminate\Database\Seeder;

class agrega_detallerol_Mantenimiento extends Seeder
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
                'cod_menu' => 8,
                'permisos' => '1,1,1,1'],
            ['cod_Rol' => 1,
                'cod_menu' => 9,
                'permisos' => '1,1,1,1'],
            ['cod_Rol' => 1,
                'cod_menu' => 10,
                'permisos' => '1,1,1,1']
        ]);
    }
}
