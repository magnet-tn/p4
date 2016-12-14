@extends('layouts.master')

@section('title')
    Add a strand to: {{ $twine->title }}
@stop

@section ('content')

    <h2>Add a strand to: {{ $twine->title }}</h2>

    <form method='POST' action='/twines/{{ $twine->id }}'>

        {{ method_field('PUT') }}

        {{ csrf_field() }}

        <input name='id' value='{{$twine->id}}' type='hidden'>

        <div class='form-group'>
            <label>Twine type</label>
            <select id='type' name='type'>
                <option value="story">Story</option>
                <option value="poem" selected>Poem</option>
                <option value="song">Song</option>
                <option value="play">Play</option>
                <option value="joke">Joke</option>
            </select>
        </div>

        <div class='form-group'>
            <label>Title: </label>
            <input type='text' id='title' name='title' value='{{ old('title', $twine->title) }}'>
            <div class='error'>
                    {{ $errors->first('title') }}
            </div>
        </div>

        <div class='form-group'>
            <label>Starter: </label>
            <input type='text' id='starter' name='starter' value='{{ old('Starter', $twine->starter) }}''>
            <div class='error'>
                    {{ $errors->first('title') }}
            </div>
        </div>

        <div>
            <input type='submit' value='Add strand'>
        </div>
    </form>
@endsection
