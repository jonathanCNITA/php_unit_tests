<?php

namespace Tests\Feature;

use App\User;
use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    // use \Illuminate\Foundation\Testing\DatabaseMigrations; //-- old version
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */

     public function testHomeWithoutAuth() 
     {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->withSession(['food' => 'bar'])
                         ->get('/');
        
        $response->assertStatus(200);
     }

     
     public function testProjectsPageWithoutAuth() 
     {
        $project = factory(Project::class)->create();
        $this->expectException(\Exception::class);

        $response = $this->withSession(['food' => 'bar'])
                         ->get('/project/show/' . ($project->id));
     }


     public function testProjectsPageWithAuth() 
     {
        $user = factory(User::class)->create();
        $project = factory(Project::class)->create();
        $response = $this->actingAs($user)
                         ->withSession(['food' => 'bar'])
                         ->get('/project/show/' . ($project->id));

        $response->assertStatus(200);
     }

}