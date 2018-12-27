<?php

use Illuminate\Database\Seeder;


class Insert_Usuarios_Table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cotz_roles')->insert([
            'nom_Rol'=>'SuperAdmin',
            'cod_Companias'=>1
        ]);
        DB::table('cotz_Usuarios')->insert([
            'cod_Empleado'=>1,
            'password'=>bcrypt('Arepa300'),
            'email'=>'lromero@arciait.com',
            'cod_Rol'=>1,
            'created_at' => new DateTime
        ]);
    }
}
