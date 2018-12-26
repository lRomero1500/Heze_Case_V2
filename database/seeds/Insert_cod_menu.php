<?php

use Illuminate\Database\Seeder;

class Insert_cod_menu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cotz_menu')->insert([
            'nom_menu'=>'Cotizador',
            'url_menu'=>'#',
            'cod_seg'=>'Cotiz',
            'cod_menu_padre'=>0,
            'url_icono'=>'#',
            'activo'=>true,
            'pos_menu'=>2,
            'orden_menu'=>1
        ]);
        DB::table('cotz_menu')->insert([
            'nom_menu'=>'PM Lite',
            'url_menu'=>'#',
            'cod_seg'=>'Lite',
            'cod_menu_padre'=>0,
            'url_icono'=>'#',
            'activo'=>true,
            'pos_menu'=>2,
            'orden_menu'=>2
        ]);
        DB::table('cotz_menu')->insert([
                'nom_menu'=>'Dashboard',
                'url_menu'=>'#',
                'cod_seg'=>'Dash',
                'cod_menu_padre'=>0,
                'url_icono'=>'#',
                'activo'=>true,
                'pos_menu'=>2,
                'orden_menu'=>3
            ]);
    }
}
