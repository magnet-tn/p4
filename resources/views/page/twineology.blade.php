@extends('layouts.mastermini')

@section('title')
    Twine-ology
@endsection


@section('head')

@endsection

@section('content')
    <div class="content">
        <h1>Twine-ology</h1>
        <hr>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>What is a <span class="stronger">Twine?</span></h3>
                <p>It is a story, poem, song, play or any creative work of words authored by two
                    or more people. It begins with a starter sentence. Then grows line by line.</p>

                <h3>Who are the <span class="stronger">Authors?</span></h3>
                <p>Hopefully you and any number of your friends. You decide how many people and how
                    you want to take turns. But take turns you must, because each line must be
                    followed by a line created by another author.</p>

                <h3>What is a <span class="stronger">Starter?</span></h3>
                <p>A Starter is a sentence or two that has been entered into our application
                    to give you as an author an idea to react to and make your own.</p>

                <h3>What is a <span class="stronger">Strand?</span></h3>
                <p>Each line written by a single author is a strand. Just like a ball the threads of
                    twine, strands are pieced together to make a long twine. Each author taking a turn.</p>

                <h3>twinest.com</h3>
                <p> The eventual home of the <em>Twinest StoryWriter</em>.</p>

                <h3>What is the inspiration for the Twinest StoryWriter?</h3>
                <p> "Yes and..." is an expression used in improvisational performance. It captures the
                    idea that good improvisational collaboration is accepting what is given to you creatively
                    by your teammate and you building on it. The "yes" is the affirmation that you will
                    encorporate their contribution into yours. The "and..." is what you add.</p>

                </p>
                <hr class='hr35'>
                <h2>Registered author</h2>
                <p>If you are registered, login and create something now.</br>
                    If you are not yet registered, <a href='/'>login in here</a>.
                </p>
                <hr class='hr35'>
                <h2>Not yet a registered author</h2>
                <p>You can <a href='/'>register here</a> to start creating a story. Or, if you are just curious, <a href='/'>here is a sampling</a> from some of our authors.
                </p>

            </div>
        </div>
    </div>
@endsection
