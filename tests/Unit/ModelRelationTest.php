<?php

namespace Tests\Unit;

use App\User;
use App\Project;
use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

class ModelRelationTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Test de la commission prélevée par le site.
     *
     * @throws \Exception
     */

    // TEST unitaire validant la relation entre les models ​Project et ​User 
    public function testUserInstanceInProject()
    {
        $project = factory(\App\Project::class, 100)->create()->random(); 
        $userProject = $project->user;
        //dump($userProject);
        $this->assertInstanceOf(User::class, $userProject);
    }
    /*
    * Creer un user associer un project
    * test 
    */

    public function testProjectInstanceInUser()
    {
        $user = factory(\App\User::class)->create();
        dump($user);
        $project = factory(\App\Project::class)->create([
            'autor' => $user->firstname,
            'user_id' => $user->id
        ]); 
        dump('##############');
        dump($user->project);
        $this->assertInstanceOf(Collection::class, ($user->project));


    }
}