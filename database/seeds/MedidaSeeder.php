<?php

use Illuminate\Database\Seeder;

class MedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Medida', 5)->create();
        //
    }
}
