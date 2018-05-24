<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Project;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index()
    {
        $projects = Project::all();
        //dd($projects);
	    return view('projects', ['projects' => $projects]);
        //return view('projects');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addProject = new Project();
        $user = Auth::user();
        $addProject->autor = $user->firstname;
        $addProject->title  = $request->input('title');
        $addProject->resume = $request->input('resume');
        $addProject->content = $request->input('content');
        $addProject->imageurl = $request->input('imageurl');
        $addProject->user_id = $user->id;
        $addProject->save();
        return redirect('projects');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $user = Auth::user();
    
		return view('project', ['project'=>$project, 'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $user = Auth::user();
        // dump($project->user_id);
        // dump($user->id);
        if ($project->user_id != $user->id){
            abort(403, 'You are not the original author of this project!');
        }
        return view('create', ['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $updateProject = Project::find($id);
        $updateProject->title  = $request->input('title');
        $updateProject->resume = $request->input('resume');
        $updateProject->content = $request->input('content');
        $updateProject->imageurl = $request->input('imageurl');
        $updateProject->save();
        return redirect('projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
