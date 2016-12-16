@extends('layouts.master')

@section('title', 'New twine')

@section ('content')
    <h2>Start new twine</h2>
    <form method='POST' action='/twines'>

        {{ csrf_field() }}

        <!-- <div class='form-group'>
            <label>Twine type</label>
            <select id='type' name='type'>
                <option value="story" selected>Story</option>
                <option value="poem">Poem</option>
                <option value="song">Song</option>
                <option value="play">Play</option>
                <option value="joke">Joke</option>
            </select>
        </div> -->
        <div class='form-group'>
            <label>Type of Twine</label>
            <select name='type_id'>
                @foreach($types_for_dropdown as $type_id => $name)
                    <option
                    value='{{ $type_id }}'
                    >{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class='form-group'>
            <label>Title: </label>
            <input type='text' id='title' name='title' value='{{ old('title', 'The Tuna Wars') }}'>
            <div class='error'>
                    {{ $errors->first('title') }}
            </div>
        </div>

        <!-- <div class='form-group'>
            <label>Starter: </label>
            <input type='text' id='starter' name='starter' value='{{ old('Starter', 'It was a blue day. Everything was blue, except the sky.') }}'>
            <div class='error'>
                    {{ $errors->first('title') }}
            </div>
        </div> -->
        <div class='form-group'>
            <label>Starter</label>
            <select name='starter_id'>
                @foreach($starters_for_dropdown as $starter_id => $starter_text)
                    <option
                    value='{{ $starter_id }}'
                    >{{ $starter_text }}</option>
                @endforeach
            </select>
        </div>    <br>

        <div>
            <input type='submit' value='Create new twine'>
        </div>
    </form>
@endsection
