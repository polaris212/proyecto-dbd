<?php

use Illuminate\Database\Seeder;

class VoluntariadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Voluntariado', 5)->create();
        //
    }
}
