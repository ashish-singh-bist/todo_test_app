<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Todo Test App</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <style>
            #loader {
                position: absolute;
            }
            #loader.running {
                opacity: 0.7;
                z-index: 1000;
                background: white;
                height: 100%;
                width: 100%;
            }
            .row{
                padding:3px;
            }            
        </style>        
    </head>
    <body>
        <div id="loader"></div>
        <div  class="container" id="app">
          <task-component></task-component>
        </div>
    </body>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</html>


