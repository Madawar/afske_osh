<!doctype html>

<html data-theme="corporate" lang="en">

<head>
    <meta charset="utf-8">
    <title>{{env('APP_NAME')}}</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link rel="icon" href="{{asset('/alarm.ico')}}">
    @livewireStyles
</head>

<body class="">
    @include('layouts.header')

    <div class=" mx-auto  border-2  border-gray-50">
        <div class="grid md:grid-cols-5 md:divide-x divide-gray divide-opacity-25 ">
               @include('layouts.sidebar')

            <div class="p-2 col-span-4">

                @yield('content')
            </div>

        </div>

    </div>
    @livewireScripts
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>

    @yield('jquery')
</body>

</html>
