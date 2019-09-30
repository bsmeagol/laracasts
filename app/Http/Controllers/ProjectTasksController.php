<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{
    //
    public function update(\App\Task $task)
    {

        $task->complete(request()->has('completed'));

        //$task->update([
        //    'completed' => request()->has('completed')
        //]);

        return back();
    }

    public function store(Project $project)
    {

       $check_description = request()->validate(['description' => 'required']);

       //dd($check_description['description']);
        Task::create([
            'description' => request('description'),
            'project_id' => $project->id
        ]);


        return back();
    }


}
