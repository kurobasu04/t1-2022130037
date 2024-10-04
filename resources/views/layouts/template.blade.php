<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Retail')</title>
    @vite(['resources/sass/app.scss', 'resources/css/app.css'])
</head>
<body>


    @yield('body')

    @vite(['resources/js/app.js'])
</body>
</html>
