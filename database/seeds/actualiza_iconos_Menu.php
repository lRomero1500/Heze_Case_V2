<?php

use Illuminate\Database\Seeder;

class actualiza_iconos_Menu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $menu=\App\Models\Menu::find(4);
        $menu->url_icono="fas fa-tachometer-alt";
        $menu->save();

        $menu=\App\Models\Menu::find(3);
        $menu->url_icono="fas fa-stopwatch";
        $menu->save();

        $menu=\App\Models\Menu::find(2);
        $menu->url_icono="fas fa-cash-register";
        $menu->save();

        $menu=\App\Models\Menu::find(8);
        $menu->url_icono="fas fa-cogs";
        $menu->save();

    }
}
