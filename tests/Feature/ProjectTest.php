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

}