<?php

use Illuminate\Database\Seeder;

class Insert_DetalleRol_Table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cotz_detalle_roles')->insert([
            'cod_Rol'=>1,
            'cod_menu'=>1,
            'permisos'=>'1,1,1,1'
        ]);
        DB::table('cotz_detalle_roles')->insert([
            'cod_Rol'=>1,
            'cod_menu'=>2,
            'permisos'=>'1,1,1,1'
        ]);
        DB::table('cotz_detalle_roles')->insert([
            'cod_Rol'=>1,
            'cod_menu'=>3,
            'permisos'=>'1,1,1,1'
        ]);
    }
}
