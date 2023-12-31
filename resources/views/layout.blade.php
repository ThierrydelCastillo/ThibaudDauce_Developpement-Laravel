<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        @section('title')
            Formation Laravel 5
        @show
    </title>
</head>
<body class="font-sans">
    <div>
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>