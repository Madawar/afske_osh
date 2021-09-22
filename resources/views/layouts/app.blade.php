<!doctype html>

<html data-theme="corporate" lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('/alarm.ico') }}">
    @livewireStyles
</head>

<body class="">
    @include('layouts.header')

    <div class=" md:flex flex-col md:flex-row w-full h-screen" id="main-app">
    @include('layouts.sidebar2')
    <div class="w-full  ">
        <div class="heading border-b border-gray-300 border-opacity-90 filter md:drop-shadow-sm bg-gray-50">
            @section('main-heading')

            @show

        </div>
        <div class="p-2">
            @yield('content')
        </div>
    </div>

    </div>
    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>

    @yield('jquery')
</body>

</html>
