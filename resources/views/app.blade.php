<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" value="{{ csrf_token() }}" />
        <title>Laravel</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />

        <body class="bg-dark text-white">

    <div id="app"></div>
    </body>
</html>

<script defer src="{{ mix('js/app.js') }}"></script>
