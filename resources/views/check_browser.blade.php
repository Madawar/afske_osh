@extends('layouts.app2')

@section('content')
    <div class="bg-yellow-400 shadow-xl">
        <div class="w-full text-grey-darker items-center p-4 text-center">
            Hi you are using {{$browser}} this application requires a Firefox or Chrome Broswer. Kindly copy the link on your email and open it in one
            of the two browsers.
        </div>

    </div>
@endsection
