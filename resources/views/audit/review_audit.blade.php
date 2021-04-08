@extends('layouts.app')

@section('content')
    <div>
        <table class="w-full">
            <tr class="border-b border-r border-gray-200">
                <td class=" p-5">Audit Name : {{ $audit->audit_name }}</td>
                <td class="p-5">Department: {{ $audit->dep->name }}</td>
                <td class="p-5">Date : {{ $audit->doneOn }}</td>
            </tr>
            <tr>
                <td class="p-5">Auditee: {{ $audit->audited->name }}</td>
                <td class="p-5">Interviewed: {{ $audit->interviewed }}</td>
                <td class="p-5">Audit Entity: {{ $audit->audit_entity }}</td>
            </tr>
        </table>

        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-400">
                    <th class="pr-5 pl-5 border-r border-t border-l border-gray-300 prose">Audit Item</th>
                    <th class="pr-5 pl-5  border-r border-t border-gray-300 prose">Finding Remarks</th>
                    <th class="pr-5 pl-5  border-r border-t border-gray-300 prose">Root Cause</th>
                    <th class="pr-5 pl-5  border-r border-t border-gray-300 prose">Root Cause Correction</th>
                    <th class="pr-5 pl-5  border-r border-t border-gray-300 prose">Close Out</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($audit->AuditItems->groupBy('subcategory') as $key => $item)
                    <tr>
                        <td class="p-1 border border-r border-gray-50 text-center bg-blue-700 text-white" colspan="7">
                            {{ $key }}</td>
                    </tr>
                    @foreach ($item as $ll)
                        @livewire('audit-response',['item'=>$ll])
                        @livewire('audit-osh-response',['item'=>$ll])
                    @endforeach

                @endforeach
            </tbody>
        </table>



    </div>
@endsection
