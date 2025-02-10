<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>About Route</title>
        @vite(['resources/css/app.css'])
    </head>
    <body class="bg-gray-900 text-white">
        <div class="flex flex-col items-center justify-center min-h-screen">
        <a class="bg-green-500 p-2 px-8 mb-4 rounded" href="/about">About Page</a>
            <h1 class="text-3xl bg-blue-500 p-4 rounded-xl">Hello Laravel</h1>
        </div>
    </body>
</html>
