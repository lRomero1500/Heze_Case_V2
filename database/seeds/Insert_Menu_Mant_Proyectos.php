<?php

use Illuminate\Database\Seeder;

class Insert_Menu_Mant_Proyectos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cotz_menu')->insert([
            ['nom_menu'=>'Proyectos',
                'url_menu'=>'dashboard/mant/proyectos',
                'cod_seg'=>'MantProj',
                'cod_menu_padre'=>8,
                'url_icono'=>'#',
                'activo'=>true,
                'pos_menu'=>1,
                'orden_menu'=>3],
            ['nom_menu'=>'Tareas',
                'url_menu'=>'dashboard/mant/tareas',
                'cod_seg'=>'MantTask',
                'cod_menu_padre'=>8,
                'url_icono'=>'#',
                'activo'=>true,
                'pos_menu'=>1,
                'orden_menu'=>4]
        ]);
    }
}
