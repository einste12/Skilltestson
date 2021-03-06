<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\CoursesType::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'created_at'=>$faker->dateTime,
        'updated_at'=>$faker->dateTime,
    ];
});
