@extends('layouts.app')

@section('content')
<div>

    @livewire('audit-creator',['audit_id'=>$audit_id])

</div>
@endsection
