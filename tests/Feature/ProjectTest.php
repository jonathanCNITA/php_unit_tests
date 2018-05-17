<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;
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

}