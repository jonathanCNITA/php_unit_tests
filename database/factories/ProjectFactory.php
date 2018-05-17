<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'resume' => $faker->sentence(3),
        'imageurl' => 'https://images.unsplash.com/photo-1519458246479-6acae7536988?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6c0202cc94df51412fc49471d653eee5&auto=format&fit=crop&w=1350&q=80',
        'content' => implode($faker->paragraphs(5)),
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
    ];
});
