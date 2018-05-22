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

    // TEST de status HTTP validé
    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    // TEST de status HTTP validé
    public function testProjectRoute()
    {
        $response = $this->get('/projects');
        $response->assertSuccessful();
    }

    
    // TEST validant la présence du titre “Liste des projets”
    public function testPresenceOfH1InProjects()
    {
        $response = $this->get('/projects');
        $toSearch = "<h1>Liste des projets</h1>";
        $response->assertSee($toSearch);
    }


    /**
     *  TEST AVEC LES DATAS DU FACTORY POUR PROJECT
     */

    // TEST validant la présence du titre d’un projet sur la page de liste des projets
    public function testPresenceOfH2InProjects()
    {
        $project = factory(\App\Project::class, 100)->create()->random();
        $response = $this->get('/projects');
        $toSearch = '<h2>' . $project->title . '</h2>';
        $response->assertSee($toSearch);
    }

    // TEST validant la présence du titre d’un projet sur la page de détails d’un projet 
    public function testPresenceOfH1InProjectFactory()
    {
        $project = factory(\App\Project::class)->create();
        $response = $this->get('/project/show/'. $project->id);
        $toSearch = '<h1>' . $project->title . '</h1>';
        $response->assertSee($toSearch);
    }
    
    // TEST unitaire validant la relation entre les models ​Project et ​User 
    // tester rel Projet - User instanceOf
    public function testPresenceOfAutorFirstnameFromUserTable()
    {
        $project = factory(\App\Project::class, 2)->create()->random(); 
        $response = $this->get('/project/show/'. $project->id);
        $toSearch = $project->user->firstname;
        $response->assertSee($toSearch);
    }

    public function testMatchingAutorProjectFirstnameUser()
    {
        $project = factory(\App\Project::class, 100)->create()->random(); 
        $actual = $project->autor;
        $expected = $project->user->firstname;
        $this->assertEquals($expected, $actual);
    }

    //  TEST validant la présence du nom de l’auteur d’un projet sur la page de détails d’un projet
    public function testPresenceOfAutorInProjectFactory()
    {
        $project = factory(\App\Project::class)->create();
        $response = $this->get('/project/show/'. $project->id);
        $toSearch = '<strong>' . $project->autor . '</strong>';
        $response->assertSee($toSearch);
    }

    //  TEST validant la présence du nom de l’auteur d’un projet sur la page de détails d’un projet
    public function testPresenceOfAutorInProjectFactory50()
    {
        $project = factory(\App\Project::class, 50)->create()->random();
        $response = $this->get('/project/show/'. $project->id);
        $toSearch = '<strong>' . $project->autor . '</strong>';
        $response->assertSee($toSearch);
    }
}