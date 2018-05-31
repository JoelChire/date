<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DATE</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {


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
                font-size: 84px;
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

            .m-b-md {
                margin-bottom: 30px;
            }
            .header-content {
              z-index: 2;
            }
            .header-video {
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100vh;
              overflow: hidden;
              z-index: -1;
            }
            .header-video video {
              min-width: 100%;
              min-height: 100%;
            }
            h1 {
              font-size: 50px;
              color: #636b6f;
              padding: 0 25px;

              font-weight: 600;
              letter-spacing: .1rem;
              text-decoration: none;
              text-transform: uppercase;
            }
            p {
              font-size: 1.2rem;
              color: #636b6f;
              padding: 0 25px;

              font-weight: 600;
              letter-spacing: .1rem;
              text-decoration: none;

            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height header content">
          <div class="header-video">
          <video src="imagen/milca.mp4" autoplay="true" loop>
          </video>
        </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Ingresar</a>
                        <a href="{{ route('register') }}">Registrarse</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                  <h1>SISTEMA DE TUTORIAS</h1>
                  <p>Ponemos a disposición de toda la comunidad universitaria, la primera versión de la página Web de Tutoría Universitaria, dentro de su contenido presentaremos diferentes documentos que son fruto del trabajo de personas que colaboraron y participaron en la implementación del Sistema de Tutoría en la UNJBG Tacna.</p>
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Contactanos</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="http://www.dasa.unjbg.edu.pe/">DASA</a>
                    <a href="http://www.unjbg.edu.pe/portal/">UNJBG</a>
                </div>
            </div>
        </div>
    </body>
</html>
