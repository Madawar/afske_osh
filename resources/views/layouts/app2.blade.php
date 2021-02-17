<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>The HTML5 Herald</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>

    <div class="container mx-auto my-5 ">

        @yield('content')


    </div>

    </div>

    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @livewireScripts
</body>

</html>
