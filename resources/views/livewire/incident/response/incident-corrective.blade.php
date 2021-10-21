<div>



    <div class="p-2 border border-gray-300 border-opacity-90 filter md:drop-shadow-sm mb-3">

        <ul class=" w-full steps">
            <li class="step step-info">Choose Contributing Factors</li>
            <li class="step step-info">Corrective Actions</li>
            <li class="step ">Preventive Actions</li>

        </ul>
    </div>
    <div class="grid justify-items-stretch">
        <div class="justify-self-center">
            <div class="tabs text-center">
                <a class="tab tab-bordered {{ $filter == '' ? 'tab-active' : '' }}" wire:click='filter("")'
                    wire:target='filter' wire:loading.class='loading'>Ongoing</a>
                <a class="tab tab-bordered {{ $filter == 'accepted' ? 'tab-active' : '' }}"
                    wire:click='filter("accepted")'>Accepted</a>
                <a class="tab tab-bordered {{ $filter == 'rejected' ? 'tab-active' : '' }}"
                    wire:click='filter("rejected")'>Rejected</a>

            </div>
        </div>
    </div>
    @if($findings->count() == 0)
        <div class="alert alert-success p-2 m-2">
            All Cleared Out Click the Tabs Above To see other sections
        </div>
    @endif
    @foreach ($findings as $finding)
        @if ($finding->rejected == 1)
            @include('livewire.incident.response.incident-finding-rejected',['finding'=>$finding])
        @else
            @livewire('incident.response.incident-finding',['finding'=>$finding], key($finding->id))

        @endif
    @endforeach

    <div class="p-2 m-4">
        <button class="btn btn-primary btn-block" wire:click='advance'>
            Next

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="inline-block w-6 h-6 ml-2 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</div>
