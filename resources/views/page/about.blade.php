@extends('layouts.master')

@section('title')
    About
@endsection


@section('head')

@endsection

@section('content')

    <div class="content">
        <h1> About StoryWriter</h1>
        <div class="row">
            <div class="column column-50 column-offset-25">

                <p>StoryWriter is web application that allows two or more contributors to collaborate
                    as authors in building a story, poem, song or play, one line at a time.</br>
                    Each author takes a turn in sequence continuing round and round until “The End.”
                </p>
                <hr>
                <h2>Registered author</h2>
                <p>If you are registered, login and create something now.</br>
                    If you are not yet registered, <a href='/'>login in here</a>.
                </p>
                <hr>
                <h2>Not yet a registered author</h2>
                <p>You can <a href='/'>register here</a> to start creating a story. Or, if you are just curious, <a href='/'>here is a sampling</a> from some of our authors.
                </p>

            </div>
        </div>
    </div>
@endsection
