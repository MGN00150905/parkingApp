<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PARKLE</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #483E3C;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                color:#f4f3ed;
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

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color:#f4f3ed;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        {!!$map['js']!!}
    </head>
    <body>
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
<!--             Only show the checkout link if the user is logged in 
            (Quicker way for the user to navigate back to payment page after looking at map) -->
            @if (Route::has('login'))
                <div class="top-left links">
                    @auth
                        <a href="{{ url('/payments') }}">Checkout</a>
                    @else
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
<!--                    Making sure the maps are only visable on welcome.php if the user is logged in
 -->                    PARKLE
                    @if (Route::has('login'))
                    @auth
                    {!!$map['html']!!}
                    @else
                    @endauth
                    @endif
                </div>

            </div>
        </div>
    </body>
</html>
