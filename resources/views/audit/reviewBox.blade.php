@extends('layouts.app_flat')

@section('content')

    @livewire('audit-response',['item'=>$audit])
@endsection
