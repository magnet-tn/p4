@extends('layouts.master')

@section('title')
Edit twine: {{ $twine->title }}
@stop

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>EDIT TWINE </h2>
            Title <strong>{{ $twine->title }}</strong> / Type:  <strong>{{ $twine->type->name }} </strong>
        </div>
    </div>
    <br/>
    <form method='POST' action='/twines/{{ $twine->id }}'>

        {{ method_field('PUT') }}

        {{ csrf_field() }}

        <input name='id' value='{{$twine->id}}' type='hidden'>

        <div class='form-group'>
            <div class="row">
                <div class="col-md-1 col-md-offset-3">
                    <label>Title:</label>
                </div>
                <div class="col-md-5">
                    <input type='text' id='title' name='title' value='{{ old('title', $twine->title) }}'>
                </div>
            </div>
            <div class='error'>
                {{ $errors->first('title') }}
            </div>
        </div>

        <div class='form-group'>
            <div class="row">
                <div class="col-md-1 col-md-offset-3">
            <label>Last Strand: </label>
        </div>
                <div class="col-md-5">
            <input type='text' id='last-strand' name='last-strand' value='{{ old('Starter', $twine->strands) }}'>
        </div>
            <div class='error'>
                {{ $errors->first('title') }}
            </div>
        </div>
<br/>
        <div class="row">
            <div class="col-md-2 col-md-offset-3">
            <input type='submit' value='Submit Changes'>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="row">
            <div class="col-md-2">
                <INPUT class='button button-outline' TYPE="button" onClick="history.go(0)" VALUE="Cancel">
            </div>
    </form>

@endsection

@section('body')


@endsection
