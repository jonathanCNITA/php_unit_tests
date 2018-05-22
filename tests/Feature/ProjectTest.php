<?php

namespace Tests\Feature;

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

    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testProjectRoute()
    {
        $response = $this->get('/projects');
        $response->assertStatus(200);
    }


    public function testPresenceOfH1InProjects()
    {
        $response = $this->get('/projects');
        $toSearch = "<h1>Liste des projets</h1>";
        $response->assertSee($toSearch);
    }

     /**
     *  TEST AVEC LES DATAS DU FACTORY POUR PROJECT
     */

    public function testPresenceOfH2InProjects()
    {
        $project = factory(\App\Project::class, 100)->create()->random();
        $response = $this->get('/projects');
        $toSearch = '<h2>' . $project->title . '</h2>';
        $response->assertSee($toSearch);
    }

    public function testPresenceOfH1InProjectFactory()
    {
        $project = factory(\App\Project::class)->create();
        $response = $this->get('/project/show/'. $project->id);
        $toSearch = '<h1>' . $project->title . '</h1>';
        $response->assertSee($toSearch);
    }

    public function testPresenceOfAutorInProjectFactory()
    {
        $project = factory(\App\Project::class)->create();
        $response = $this->get('/project/show/'. $project->id);
        $toSearch = 'by ' . $project->auth;
        $response->assertSee($toSearch);
    }

    public function testPresenceOfAutorInProjectFactory50()
    {
        $project = factory(\App\Project::class, 50)->create()->random(); 
        $response = $this->get('/project/show/'. $project->id);
        $toSearch = 'by ' . $project->auth;
        $response->assertSee($toSearch);
    }

    public function testPresenceOfAutorFirstnameInTheUserTable()
    {
        $project = factory(\App\Project::class, 2)->create()->random(); 
        $response = $this->get('/project/show/'. $project->id);
        $toSearch = $project->user->firstname;
        // dump($toSearch);
        // dump('##########################################');
        // dump($response);
        $response->assertSee($toSearch);
    }

}