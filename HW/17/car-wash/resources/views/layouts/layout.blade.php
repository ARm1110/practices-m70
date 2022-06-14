<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="default-src *;
    img-src * 'self' data: https: http:;
    script-src 'self' 'unsafe-inline' 'unsafe-eval' *;
    style-src  'self' 'unsafe-inline' *">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <title>car wash</title>
</head>

<body class="mx-5 my-2">
    <x-header>

    </x-header>

    @yield('content')

    <x-footer>

    </x-footer>
</body>

</html>
