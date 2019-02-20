<?php

use Illuminate\Database\Seeder;

class Insert_Menu_Mantemienento_Departamento_Servicios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hez_menu')->insert([
            ['nom_menu'=>'Departamentos',
                'url_menu'=>'mantenimiento/departamentos',
                'cod_seg'=>'MantDep',
                'cod_menu_padre'=>8,
                'url_icono'=>'#',
                'activo'=>true,
                'pos_menu'=>1,
                'orden_menu'=>2],
            ['nom_menu'=>'Servicios',
                'url_menu'=>'mantenimiento/servicios',
                'cod_seg'=>'MantSrv',
                'cod_menu_padre'=>8,
                'url_icono'=>'#',
                'activo'=>true,
                'pos_menu'=>1,
                'orden_menu'=>3]
        ]);
    }
}
