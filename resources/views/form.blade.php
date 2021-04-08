@extends('layouts.app2')

@section('content')
    <div>

        @livewire('incident-form',['incident_id'=>$query])

    </div>
@endsection
