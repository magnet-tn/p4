@extends('layouts.master')

@section('title', 'Start a twine')

@section ('content')
    <h2>Start a twine</h2>
    <form method='POST' action='/twines'>

        {{ csrf_field() }}

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
            <input type='text' id='title' name='title' value='{{ old('title', 'The Tuna Wars') }}'>
            <div class='error'>
                    {{ $errors->first('title') }}
            </div>
        </div>

        <div class='form-group'>
            <label>Starter: </label>
            <input type='text' id='starter' name='starter' value='{{ old('Starter', 'It was a blue day. Everything was blue, except the sky.') }}''>
            <div class='error'>
                    {{ $errors->first('title') }}
            </div>
        </div>

        <div>
            <input type='submit' value='Start your twine'>
        </div>
    </form>
@endsection