<?php

use Illuminate\Database\Seeder;

class UniversityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	

    $faker = Faker\Factory::create();

    	factory('App\University',10)->create();
    }

    

        
	
}
