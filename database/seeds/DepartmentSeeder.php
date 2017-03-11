<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('departments') -> insert([
        'name'=>'Departamento del Programa Nacional de formacion en Informatica',
		'slug'=>'pnfi',
        'description'=>'Colmena rules',
    	]);
    }
}
