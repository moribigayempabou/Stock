<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestion de stock</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* Your existing styles */
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                flex-direction: column;
            }

            .container {
                text-align: center;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .brand-image {
                width: 200px; /* Adjust the width of the image */
                height: 200px; /* Adjust the height of the image */
                object-fit: cover;
                border-radius: 50%;
                margin-bottom: 20px;
            }

            h1 {
                font-size: 36px; /* Increase the font size */
                margin-bottom: 30px;
            }

            .buttons {
                display: flex;
                gap: 20px;
                justify-content: center;
            }

            .button {
                display: inline-block;
                padding: 12px 24px;
                border-radius: 4px;
                background-color: #007bff;
                color: #fff;
                text-decoration: none;
                font-size: 18px; /* Increase the font size */
            }

            .button:hover {
                background-color: #0056b3;
            }

            a.button:first-child {
                background-color: #28a745;
            }

            a.button:first-child:hover {
                background-color: #1e7e34;
            }
        </style>
    </head>
    <body class="antialiased">


            <div class="container">
                <!-- Add the image here using the <img> tag -->
                <img src="{{ asset('dist/img/UJKZ.png') }}" alt="UJKZ"  height="300" width="300">

                <h1> PLATEFORME DE GESTION DE STOCK DE MATERIEL DE L'UJKZ</h1>
                <div class="buttons">

                    @if (Route::has('login'))
                        <div>
                            @auth

                            <a href="{{route('home')}}" class="button">Gestion de stock UJKZ</a>
                            @else
                                <a href="{{ route('login') }}" class="button">Se connecter</a>
                            @endauth
                        </div>

                    @endif

            </div>



                </div>
            </div>
        </div>
    </body>
</html>
 {{--<a href="{{ route('register') }}" class="button">S'inscrire</a>--}}
