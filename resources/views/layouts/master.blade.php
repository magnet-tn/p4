<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title','StoryWriter')
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>StoryWriter</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'>

    <!-- Styles -->
    <link href="/css/p4.css" type='text/css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/milligram/1.1.0/milligram.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css' rel='stylesheet'>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="img/TroubleU-icon.png">

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>
    @if(Session::get('flash_message1') != null)
        <div class="flash_message1">
            {{ Session::get('flash_message1') }}<span class='flash_message2'>{{ Session::get('flash_message2') }}</span>
        </div>
    @endif

    <header>
        <!-- <img
        src='img/StoryWriterLogo.png'
        style='width:300px'
        alt='Logo'> -->

        <div class="flex-center position-ref top">
            @if (Route::has('login'))
                <div class="top-right links">
                        @if(Auth::check())
                        <a href="{{ url('/logout') }}">Logout</a>
                        @else
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
</div>
            <div class="content">

                    <div class="links">
                        <a href="/">Home</a>
                        <a href="http://p4.troubleu.com">Live</a>
                        <a href="https://github.com/magnet-tn/p4" target='_blank'>GitHub</a>
                        <a href="/about">About</a>
                        <a href="/twineology">Twine-ology</a>
<hr>
                    </div>
                <div >
                    <a href='/'><img src="/img/StoryWriterLogo.png" alt="StoryWriter" width="35%"></a>
                </div>

                <nav>
                    <ul class='navlinks'>
                        @if(Auth::check())
                            <li><a href='/twines' class="button button-outline">View all twines</a></li>
                            <li><a href='/twines/create' class="button button-outline">Start a new twine</a></li>
                        @else
                            <li><a href='/' class="button button-outline">&nbsp;&nbsp;Home&nbsp;&nbsp;</a></li>
                            <li><a href='/login' class="button button-outline">&nbsp;Log in&nbsp;</a></li>
                            <li><a href='/register' class="button button-outline">Register</a></li>
                        @endif
                    </ul>
                </nav>

            </div>

    </header>

    <section>
        <hr>
        <div class="container-fluid">
            {{-- Main page content will be yielded here --}}
            @yield('content')

        </div>
    </section>

    <footer>
        &copy; {{ date('Y') }} StoryWriter &nbsp;&nbsp;
        <a href='https://github.com/magnet-tn/p4' target='_blank'><i class='fa fa-github'></i> View on Github</a> &nbsp;&nbsp;
        <a href='http://p4.troubleu.com' target='_blank'><i class='fa fa-link'></i> View Live</a>
    </footer>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</body>
</html>
