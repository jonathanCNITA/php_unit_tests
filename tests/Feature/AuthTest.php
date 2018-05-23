<?php

namespace Tests\Feature;

use App\User;
use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
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


    // CREATE
    public function testCreatePageWithoutAuth() 
    {
        
        $this->expectException(\Exception::class);

        $response = $this->withSession(['food' => 'bar'])
                         ->get('/project/create');
    }


    public function testCreatePageWithAuth() 
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
                         ->withSession(['food' => 'bar'])
                         ->get('/project/create');

        $response->assertStatus(200);
    }


    // EDIT
    // tests qui interdit l’édition d’un projet par un utilisateur qui n’en est pas l’auteur
    public function testProjectEditGoodUser()
    {
        $user1 = factory(User::class)->create();
        $project = factory(Project::class)->create([
            'autor' => $user1->firstname,
            'user_id' => $user1->id
        ]);
        
        $response = $this->actingAs($user1)
                         ->withSession(['toto' => 'bar'])
                         ->get('/project/edit/' . $project->id);

        $response->assertStatus(200); 
    }

    
    public function testProjectEditBadUser()
    {

        $this->expectException(\Exception::class);
        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        $project = factory(Project::class)->create([
            'autor' => $user1->firstname,
            'user_id' => $user1->id
        ]);

        $response = $this->actingAs($user2)
                         ->withSession(['toto' => 'bar'])
                         ->get('/project/edit/' . $project->id);

        $response->assertStatus(404);
    }    


    public function testProjectEditNotLogged()
    {

        $this->expectException(\Exception::class);
        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        $project = factory(Project::class)->create([
            'autor' => $user1->firstname,
            'user_id' => $user1->id
        ]);

        $response = $this->withSession(['toto' => 'bar'])
                         ->get('/project/edit/' . $project->id);

        $response->assertStatus(404);
    }    

}