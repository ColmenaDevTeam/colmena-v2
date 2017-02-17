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
        'name'=>'Programacion',
        'description'=>'Colmena rules',
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now()
    	]);
    }
}
