<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #020202;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-weight: bold;
                font-size: 64px;
                color: #ffffff;

            }

            .text {
                color: #fff60c;
                font-weight: 800;

            }
            .text1 {
                font-weight: bold;
                color: #ffffff;
            }
            .messag {
                font-size: 40px;
                color: #1fcc2d;
            }

            .messagNot {
                font-size: 40px;
                color: #cc4b1a;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="">
                    <p class="title">Anti-counterfeiting</p>
                    <div class="">
                            @if( !empty($message))
                                <span id="messag" class="messag">{{$message}}</span>
                            @endif

                            @if( !empty($messageNot))
                                    <span id="messagNot" class="messagNot">{{$messageNot}}</span>
                            @endif
                        <div class="">
                            <p class="text1">Please Input your product ID</p>
                            <form method="post" action="{{url('counterfeiting')}}">
                                {{csrf_field()}}
                            <div class="">
                                <input type="text" name="code" id="code" placeholder="Prosuct ID">
                                <button type="submit">Check</button>

                            </div>
                            </form>

                        </div>
                    </div>
                    <p class="text">Please enter your security code,make sure your Product is the original</p>
                </div>
            </div>
        </div>
    </body>
</html>
