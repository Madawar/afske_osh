@extends('layouts.app2')

@section('content')
    <div>
        @livewire('incident-form', ['incident_id'=>$id])

    </div>
@endsection
