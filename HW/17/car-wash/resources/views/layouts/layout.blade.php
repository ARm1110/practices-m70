<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script href="{{ asset('js/notify.js') }}"></script>
    <script href="{{ asset('js/notify.min.js') }}"></script>

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
<s src="{{ asset('js/ajax.js') }}"></s>

</html>
