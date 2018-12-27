<?php

use Illuminate\Database\Seeder;

class Insert_Menu_CRM_Menu_Tables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cotz_menu')->insert([
            'nom_menu'=>'CRM',
            'url_menu'=>'#',
            'cod_seg'=>'CRM',
            'cod_menu_padre'=>0,
            'url_icono'=>'#',
            'activo'=>true,
            'pos_menu'=>1,
            'orden_menu'=>1
        ]);
        DB::table('cotz_menu')->insert([
            'nom_menu'=>'Empresa',
            'url_menu'=>'dashboard/crm/empresas',
            'cod_seg'=>'CRM_Cotz_Empresa',
            'cod_menu_padre'=>4,
            'url_icono'=>'#',
            'activo'=>true,
            'pos_menu'=>1,
            'orden_menu'=>1
        ]);
        DB::table('cotz_menu')->insert([
            'nom_menu'=>'Clientes',
            'url_menu'=>'dashboard/crm/clientes',
            'cod_seg'=>'CRM_Cotz_Clientes',
            'cod_menu_padre'=>4,
            'url_icono'=>'#',
            'activo'=>true,
            'pos_menu'=>1,
            'orden_menu'=>2
        ]);
        DB::table('cotz_menu')->insert([
            'nom_menu'=>'Colaboradores',
            'url_menu'=>'dashboard/crm/colaboradores',
            'cod_seg'=>'CRM_Cotz_Colaboradores',
            'cod_menu_padre'=>4,
            'url_icono'=>'#',
            'activo'=>true,
            'pos_menu'=>1,
            'orden_menu'=>3
        ]);
    }
}
