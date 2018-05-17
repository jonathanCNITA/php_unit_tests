<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
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
     * Test du de la presence d'un projet
     * 
     */
    public function testAProjectRoute()
    {
        $response = $this->get('/project/show/3');
        $response->assertStatus(200);
    }

    /**
     * Test du de la presence d'un Titre dans un projet
     * 
     */
    public function testPresenceOfH1InProject()
    {
        $response = $this->get('/project/show/3');
        $toSearch = '<h1>Quae at modi sapiente ut illo.</h1>';
        $response->assertSee($toSearch);
    }


}