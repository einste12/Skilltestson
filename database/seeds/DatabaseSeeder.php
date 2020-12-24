<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\School::class,10)->create();
        factory(App\Campuses::class,10)->create();
        factory(App\Courses::class,10)->create();
        factory(App\CoursesType::class,10)->create();
        factory(App\CoursesTypePivot::class,5)->create();

    }
}
