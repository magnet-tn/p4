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
    <a href='/'>
        <img
        src='img/StoryWriterLogo.png'
        style='width:300px'
        alt='Logo'>
    </a>

</head>
<body>

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
