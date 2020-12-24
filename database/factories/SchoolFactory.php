<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\School;
use Faker\Generator as Faker;

$factory->define(School::class, function (Faker $faker) {
    return [

        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'logo'  => $faker->image('public/storage',100,100, null, null,false),
        'website' => $faker->url,
        'created_at'=>$faker->dateTime,
        'updated_at'=>$faker->dateTime,

    ];
});
