<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Campuses::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'school_id'=> factory(\App\School::class)->create()->id,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'address'=>$faker->address,
        'created_at'=>$faker->dateTime,
        'updated_at'=>$faker->dateTime,
    ];
});
