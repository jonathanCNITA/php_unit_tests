<?php

use Illuminate\Database\Seeder;
Use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Project');

        for($i = 1; $i < 10; $i++){
            DB::table('projects')->insert([
                'title' => $faker->sentence(),
                'resume' => $faker->sentence(3),
                'imageurl' => 'https://images.unsplash.com/photo-1519458246479-6acae7536988?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6c0202cc94df51412fc49471d653eee5&auto=format&fit=crop&w=1350&q=80',
                'content' => implode($faker->paragraphs(5)),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        } 
    }
}
