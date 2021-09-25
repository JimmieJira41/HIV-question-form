<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>แบบประเมินความเสี่ยง</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pridi&display=swap" rel="stylesheet">
        <link href="{{asset('/css/app.css')}}" rel="stylesheet">
        <style>
            body,html{
                font-family: 'Pridi', serif;
                background-color: #D1E6E4;
                height: 100vh !important;
            }

        </style>

    </head>
    <body>
        <div id="app">
            <App></App>
        </div>
    </body>
    <script src="{{mix('/js/app.js')}}"></script>
</html>
