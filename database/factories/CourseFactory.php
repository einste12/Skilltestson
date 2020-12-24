<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Courses::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'campus_id'=>factory(\App\Campuses::class)->create()->id,
        'price'=>$faker->randomNumber(2),
        'created_at'=>$faker->dateTime,
        'updated_at'=>$faker->dateTime,
    ];
});
