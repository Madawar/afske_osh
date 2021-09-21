<div>
    <div class="p-2 border border-gray-300 border-opacity-90 filter md:drop-shadow-sm mb-3">

        <ul class=" w-full steps">
            <li class="step step-info">Choose Contributing Factors</li>
            <li class="step step-info">Corrective Actions</li>
            <li class="step ">Preventive Actions</li>
            <li data-content="?" class="step step-error">Close Incident</li>
            </ul>
        </div>

    @foreach ($findings as $finding)
        @livewire('incident.response.incident-finding',['finding'=>$finding])
    @endforeach
</div>
