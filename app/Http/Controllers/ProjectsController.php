<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {

        $projects = \App\Project::all();

        //return $projects;

        return view('projects.index', ['projects' => $projects]);
    }

    public function create()
    {

        return view('projects.create');

    }
    public function store()
    {

        //serverside validate:
        $attributes = request()->validate([
           'title' => ['required', 'min:3', 'max:50'],
           'description' => 'required'
        ]);
        //als validation failt -> redirect naar zelfde pagina & stuur error data in get/post idk


        //$project = new \App\Project();
        //$project->title = request('title');
        //$project->description = request('description');
        //$project->save();

        Project::create($attributes);

        return redirect('/projects');


    }
    public function show(Project $project)
    {
        //$project = \App\Project::find($id);  overbodig want hier zoek je drect $project var


        return view('projects.show',['project' => $project]);
    }
    public function update($id)
    {
        //dd(request()->all()); //dump data (dye dump)

        //Project::create(request(['title', 'description'])); //ipv 3 lijnen hieronder
        // -> mass assignment -> hierbij opletten -> $guarded/$fillable vars zetten in Model

        $project = \App\Project::find($id);


        $project->title = request('title');
        $project->description = request('description');

        for ($x = 0; $x < count($project->tasks); $x++)
        {
            //dd($project->tasks[$x]->id);
            foreach(request('tasks') as $task)
            {

                if($project->tasks[$x]->id == $task['id'])
                {
                    //dd($project->tasks[$x]->description .'='. $task['description']);
                    //dd($task['description']);
                    $project->tasks[$x]->description = $task['description'];

                    if(count($task) == 2) { $project->tasks[$x]->completion = false; }
                }
            }
        }




        //dd(request()->all());

        $project->save();

        return redirect('/projects');

    }
    public function destroy($id)
    {
        $project = \App\Project::findOrFail($id);

        $project->delete();

        return redirect('/projects');
    }
    public function edit($id)
    {
        $project = \App\Project::find($id);
        return view('projects.edit', ['project' => $project]);
    }

}
