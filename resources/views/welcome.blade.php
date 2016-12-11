@extends('layouts.master')

@section('title')
    Welcome
@stop


@section('head')
    <link href="/css/welcome.css" type='text/css' rel='stylesheet'>
@stop

@section('content')

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
        </div>
    @endif

    <div class="content">

        <div class="title m-b-md">
            <img src="img/StoryWriterLogo.png" alt="StoryWriter" width="50%">
        </div>
        <p>StoryWriter is web application that allows two or more contributors to collaborate</br>
            as authors in building a story or poem one sentence or line at a time.</br>
            Each author takes a turn in sequence continuing round and round until “The End.”</br></p>

        <div class="links">
            <a href="http://p4.troubleu.com">Live</a>
            <a href="https://github.com/magnet-tn/p4">GitHub</a>
            <a href="https://laravel.com/docs">Laravel</a>
        </div>
    </div>
</div>

@stop
