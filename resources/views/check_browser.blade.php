@extends('layouts.app2')

@section('content')
    <div class="bg-yellow-400 shadow-xl">
        <div class="w-full text-grey-darker items-center p-4 text-center">
            Hi you are using {{ $browser }} this application requires a Firefox or Chrome Broswer. Kindly copy the link
            on your email and open it in one
            of the two browsers.
        </div>


    </div>

    <div class="flex flex-row mt-5">
        <div class="flex-auto ">
            <h1 class="prose font-bold">Please Follow the Below Instructions to use this application in Chrome or firefox</h1>
            <ol class="list-decimal prose border border-gray-300 p-5 text-center">
                <li><b>Open Chrome</b></li>
                <li>Type the address: <b>osh.tranglobal.co.ke</b> and <b>press enter</b> </li>
            </ol>
        </div>
        <div class="flex flex-auto">

        </div>

    </div>
@endsection
