<?php

use Illuminate\Database\Seeder;

class RNVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\RNV', 5)->create();
        //
    }
}
