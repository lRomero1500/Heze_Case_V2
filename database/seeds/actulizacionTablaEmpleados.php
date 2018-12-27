<?php

use Illuminate\Database\Seeder;

class actulizacionTablaEmpleados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Cotz_Empleados')->update([
            'password' => bcrypt('Arepa300'),
            'created_at' => new DateTime
        ]);
    }
}
