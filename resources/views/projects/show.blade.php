<h1>Show Project</h1>

<p>Project nr {{ $project->id }}</p>
<h6> {{ $project->title }}</h6>
<p>{{ $project->description }}</p>

<div>
    <h3>Tasks:</h3>

        @foreach($project->tasks as $task)
                <form method="POST" action="/tasks/{{ $task->id }}">
                    @method("PATCH")
                    {{ csrf_field() }}

                    <label for="completed"></label>
                    <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed? 'checked' : '' }}>
                    {{ $task->description }}
                </form>

                <br><br>
            @endforeach
    <br>

    <form method="POST" action="/projects/{{ $project->id }}/tasks">
        {{ csrf_field() }}
        <input type="text" name="description" placeholder="New Task">
        <button type="submit">Add Task</button>
    </form>

</div>


<a href="/projects/{{ $project->id }}/edit">EDIT</a>

@include('projects.errors')
