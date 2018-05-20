<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Панель управління</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/material-datetime-picker.css') }} ">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{-- Preload --}}
    <style>
        body{background:#ECF0F1}

        .load{position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);
            /*change these sizes to fit into your project*/
            width:100px;
            height:100px;
            z-index: 1122;
        }
        .load hr{border:0;margin:0;width:40%;height:40%;position:absolute;border-radius:50%;animation:spin 2s ease infinite}

        .load :first-child{background:#000;animation-delay:-1.5s}
        .load :nth-child(2){background:#F63D3A;animation-delay:-1s}
        .load :nth-child(3){background:#000;animation-delay:-0.5s}
        .load :last-child{background:#000}

        @keyframes spin{
            0%,100%{transform:translate(0)}
            25%{transform:translate(160%)}
            50%{transform:translate(160%, 160%)}
            75%{transform:translate(0, 160%)}
        }

        #overlay {
            position: fixed; /* Sit on top of the page content */
            width: 100%; /* Full width (cover the whole page) */
            height: 100%; /* Full height (cover the whole page) */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.9); /* Black background with opacity */
            z-index: 1121; /* Specify a stack order in case you're using a different order for other elements */
            cursor: pointer; /* Add a pointer on hover */
        }
        div.wrapper { display: block; }
        div.blured-wrapper {
            -webkit-filter: blur(2px);
            filter: blur(2px);
        }
        div.wrapper {
            -webkit-filter: none;
            filter: none;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
<body>
    <div id="overlay"></div>
    @include('includes.preload')

    <div id="app" class="blured-wrapper">
        @yield('content')
    </div>

    <!-- Scripts -->
    @yield('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rome/2.1.22/rome.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    <script>
        setTimeout(function () {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('preloader').style.display = 'none';
            $('.blured-wrapper').attr('class', 'wrapper');
        },
        2000);
    </script>
</body>
</html>
