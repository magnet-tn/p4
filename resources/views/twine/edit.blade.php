@extends('layouts.master')

@section('title')
Edit twine: {{ $twine->title }}
@stop

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>EDIT TWINE </h2>
            <hr>
        </div>
            </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-3">
            Title <strong>{{ $twine->title }}</strong> / Type:  <strong>{{ $twine->type->name }} </strong>
        </div>
        <div class="col-md-2">
            <span class="pull-right">
         Delete this twine<a href='/twines/{{ $twine->id }}/delete'>  <i class='fa fa-trash'></i></a>
     </span>
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
                    @if($strand != null)
            <input type='text' id='last-strand' name='last-strand' value='{{ old('last_strand', $strand->strand_text) }}'>
                @else
                <span class='button button-outline'>You have not yet added a strand to your twine.</span>
                @endif

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
        </div>
    </form>

@endsection

@section('body')


@endsection
