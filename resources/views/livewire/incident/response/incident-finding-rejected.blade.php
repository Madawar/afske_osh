<div class="w-auto m-8 text-gray-800 bg-white divide-y divide-gray-300 rounded-lg shadow-md sm:m-4">

    <div class="text-center block font-sans font-semibold text-gray-900 p-3">
        {{ $finding->factor }}
    </div>
    <div class=" ">
        <div class=" block font-sans font-semibold text-gray-900 ">Corrective Action : </div>
        <div class="p-2">{{ $finding->corrective_action }}</div>
    </div>
    <div>
        <div class=" block font-sans font-semibold text-gray-900 ">Osh Remarks : <span class="badge badge-error">Rejected</span> </div>
        <div class="p-2"> {{ $finding->osh_remarks }}</div>
    </div>

</div>
