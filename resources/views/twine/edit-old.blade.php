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
            <label>Type of Twine</label>
            <select name='type_id'>
                @foreach($types_for_dropdown as $type_id => $name)
                <option
                {{ ($type_id == $twine->type->id) ? 'SELECTED' : '' }}
                value='{{ $type_id }}'
                >{{ $name }}</option>
                @endforeach
            </select>
        </div>    <br>

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
