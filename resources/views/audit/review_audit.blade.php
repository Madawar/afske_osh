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

        <div class="alert mt-2 mb-2">
            <div class="flex-1">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#2196f3" class="w-6 h-6 mx-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
              </svg>
              <label>Please Click on Close to fill out Root Cause,Root Cause and Close Gap</label>
            </div>
          </div>
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-400">

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
                    <tr>
                        <td class="p-1 border border-r border-gray-50 text-left bg-gray-400 text-red-800" colspan="7">
                          <b>{{$loop->index+1}} : </b>  <span class="leading-relaxed">{{ $ll->item }}</span>

                        </td>
                    </tr>
                        <tr>

                            <td class="p-3 border border-r border-gray-50">{{ $ll->finding }}</td>
                            <td class="p-3 border border-r border-gray-50">{{ $ll->root_cause }}</td>
                            <td class="p-3 border border-r border-gray-50">{{ $ll->root_cause_correction }}</td>
                            <td class="p-3 border border-r border-gray-50">
                                <button onClick="open_view({{ $ll->id }})" class="btn btn-success">Close</button>

                            </td>

                        </tr>

                        @if (Auth::user()->account_type == 'osh')
                            @livewire('audit-osh-response',['item'=>$ll])
                        @endif
                    @endforeach

                @endforeach
            </tbody>
        </table>
        @if (Auth::user()->account_type == 'osh')

            <a href="{{ route('audit.oshreview', $audit->id) }}"
                class="w-full inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-700 rounded shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none">Respond
                to Auditee</a>


        @else

            <a href="{{ route('audit.close', $audit->id) }}"
                class="w-full inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-700 rounded shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none">Close
                Out Items</a>


        @endif

        <div id="backstore" style="display: none">
            <div id="content">
                @livewire('checklist-creator',['checklist_id'=>null])
            </div>
        </div>

    </div>
@endsection

@section('jquery')
    <script>
        function open_view(clicked_id) {
            new WinBox("Close Audit Item", {
                url: "/audit_box/" + clicked_id + "/review",
                x: "center",
                y: "center",
                width: "80%",
                height: "80%"
            });
        }

    </script>

@endsection
