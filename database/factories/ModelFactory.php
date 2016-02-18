<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\University::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
       
    ];
});

$factory->define(App\College::class, function (Faker\Generator $faker) {
    return [
    	'university_id' => factory(App\University::class)->create()->id,
        'name' => 'College Number',
        'slug' => $faker->slug
       
    ];
});

$factory->define(App\School::class, function (Faker\Generator $faker) {
    return [
    	
        'name' => 'School Number',
        'slug' => $faker->slug
       
    ];
});
