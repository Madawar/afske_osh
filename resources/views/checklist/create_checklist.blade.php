@extends('layouts.app')

@section('content')
<div>

    @livewire('checklist-creator',['checklist_id'=>$checklist_id])

</div>
@endsection
