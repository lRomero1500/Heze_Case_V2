<?php

use Illuminate\Database\Seeder;

class agrega_menues_faltantes extends Seeder
{

    public function run()
    {
        DB::table('cotz_menu')->where('cod_menu',4)->update([
            'url_menu'=>'dashboard/home',
        ]);
        DB::table('cotz_menu')->where('cod_menu',2)->update([
            'url_menu'=>'front/cotizador',
        ]);
        DB::table('cotz_menu')->where('cod_menu',1)->update([
            'url_menu'=>'/',
        ]);
        DB::table('cotz_menu')->insert([
            ['nom_menu'=>'Mantenimiento',
            'url_menu'=>'#',
            'cod_seg'=>'Mant',
            'cod_menu_padre'=>0,
            'url_icono'=>'#',
            'activo'=>true,
            'pos_menu'=>1,
            'orden_menu'=>2],
            ['nom_menu'=>'Empresa',
                'url_menu'=>'dashboard/mant/empresas',
                'cod_seg'=>'MantEmp',
                'cod_menu_padre'=>8,
                'url_icono'=>'#',
                'activo'=>true,
                'pos_menu'=>1,
                'orden_menu'=>1],
            ['nom_menu'=>'Colaboradores',
            'url_menu'=>'dashboard/mant/colaboradores',
            'cod_seg'=>'MantEmp',
            'cod_menu_padre'=>8,
            'url_icono'=>'#',
            'activo'=>true,
            'pos_menu'=>1,
            'orden_menu'=>2]
        ]);

    }
}
