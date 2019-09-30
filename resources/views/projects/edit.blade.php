@extends('layout')

@section('content')

<h1 class="title">Edit Project</h1>

    <form method="POST" action="/projects/{{ $project->id }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="field">
            <label class="label" for="title">Title</label>

            <div class="control">
                <input type="text" class="input" name="title" placeholder="Title" value="{{ $project->title }}">
            </div>
        </div>

        <div class="field">
            <label for="description" class="label"></label>
            <div class="control">
                <textarea name="description" class="textarea">{{ $project->description }}</textarea>
            </div>
        </div>



        <ul>
            @foreach($project->tasks as $task)
                <li>
                    <input type="hidden" name="tasks[{{ $task->id }}][id]" value="{{ $task->id }}">
                    <input type="text" name="tasks[{{ $task->id }}][description]" value="{{ $task->description }}">
                    <input type="checkbox" name="tasks[{{ $task->id }}][completion]" value="completed" {{ $task->completed? 'checked' : '' }}>
                </li>
            @endforeach
        </ul>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update project</button>
            </div>
        </div>

    </form>
    <form method="POST" action="/projects/{{ $project->id }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit">Delete project</button>
    </form>




