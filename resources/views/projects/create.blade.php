<h1>Create:</h1>

<form method="POST" action="/projects">

    {{ csrf_field() }}

    <div>
        <input type="text", name="title", placeholder="project title" style="{{ $errors->has('title') ? 'border-color:red' : '' }}" value="{{ old('title') }}" required>
        <!-- required -> clientside validation !-->
        <!-- old('title') zet value standaard op vorige value !-->
    </div>

    <div>
        <textarea name="description" style="{{ $errors->has('description') ? 'border-color:red' : ''}}" required></textarea>
    </div>

    <div>
        <input type="submit">
    </div>

    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li style="color:red">
                    {{ $error }}
                </li>
                @endforeach
        </ul>
    </div>
</form>
