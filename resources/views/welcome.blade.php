<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>10/10</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/hover.css') }}" />


        <!-- Styles -->
        <style>
            html, body {
                background-color: #2F2D2E;
                color: white;
                font-family: sans-serif;
                font-weight: bold;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }
            .special{
                display: inline-block;
                height:auto;
                justify-content: auto;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            #bt{
                color:#2F2D2E;
            }
            .hvr-sweep-to-right{
                background:white;
            }
            .hvr-sweep-to-right:before{
                background:white;
            }
            .hvr-sweep-to-right:hover{
                color:black;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            .typewriter h2 {
              overflow: hidden; /* Ensures the content is not revealed until the animation */
              border-right: .15em solid white; /* The typwriter cursor */
              white-space: nowrap; /* Keeps the content on a single line */
              margin: 0 auto; /* Gives that scrolling effect as the typing happens */
              letter-spacing: .15em; /* Adjust as needed */
              animation: 
                typing 3.5s steps(40, end),
                blink-caret .75s step-end infinite;
            }

            /* The typing effect */
            @keyframes typing {
              from { width: 0 }
              to { width: 100% }
            }

            /* The typewriter cursor effect */
            @keyframes blink-caret {
              from, to { border-color: transparent }
              50% { border-color: orange; }
            }
             
        </style>
        <script>
             $(window).load(function() 
            {          
             $("#preloaders").delay(1500).slideUp(800);
               });
        </script>
    </head>
    <body>
        <div id="preloaders" class="preloader"></div>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                   10/10
                </div>
                <div class="typewriter">
                    <h2>Online Examination Portal.</h2>
                </div>
                <br>
                <div class="links">
                    <div id="special">
                        <a href="/teacher/register" id="bt" class="btn btn-sm animated-button victoria-one hvr-sweep-to-right">Teacher Register</a>
                        <a href="/teacher/login" id="bt" class="btn btn-sm animated-button victoria-one hvr-sweep-to-right">Teacher Login</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>
