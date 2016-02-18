<?php

use Illuminate\Database\Seeder;

class CollegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\University::class, 50)->create()->each(function($u) {
        $u->colleges()->save(factory(App\College::class)->make());
    });
    }
}
