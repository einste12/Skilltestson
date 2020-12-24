<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\CoursesTypePivot::class, function (Faker $faker) {
    return [

        'course_id'=> factory(\App\Courses::class)->create()->id,
        'course_type_id'=> factory(\App\CoursesType::class)->create()->id,


    ];
});
