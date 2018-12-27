<?php

use Illuminate\Database\Seeder;

class edita_menus_CRM extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cotz_menu')->whereBetween('cod_menu',[5,7])->update([
            'cod_menu_padre'=>1,
        ]);
    }
}
