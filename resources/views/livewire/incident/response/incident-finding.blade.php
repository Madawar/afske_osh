<div class=" m-2 mb-3 border  border-opacity-90 filter md:drop-shadow-sm border-gray-300 ">
    <div class=" bg-gray-50  border-b  border-opacity-90">
        <div class=" flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">
                <x-forms.input label="Contributing Factor" placeholder="Finding" wire:model="finding.factor" disabled
                    name="factor" />
            </div>
        </div>
        <div
            class="w-full text-center text-center text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
            5-Why Analysis</div>
        @foreach ($analysis as $key => $item)
            <div>
                @livewire('incident.response.why',['analysis'=>$item,'key'=>$key],key($key))
            </div>
        @endforeach

        <div class="w-full text-center">
            <button class="btn btn-circle btn-primary" wire:target="addAnalysis" wire:click='addAnalysis'>
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 stroke-current" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

            </button>
        </div>
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">
                <x-forms.textarea label="Corrective Action" placeholder="Finding" wire:model="finding.corrective_action"
                    name="finding.corrective_action" />
            </div>
        </div>
    </div>
    @if (Auth::user()->account_type == 'osh')
        <div class="bg-gray-200 p-2 border  border-opacity-90 shadow-sm">
            OSH
            <div class=" flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
                <div class="flex-auto">
                    <x-forms.input label="OSH Remarks" placeholder="Osh Remarks" wire:model="finding.osh_remarks"
                        name="finding.osh_remarks" />
                </div>
            </div>
            <div class=" flex flex-col md:flex-row  md:space-x-1 md:space-y-0 space-y-1 w-full">
                <div class="flex-auto">
                    <button class="btn btn-success btn-block" wire:loading.class="loading" wire:target='acceptCorrectiveAction' wire:click='acceptCorrectiveAction'>Accept Finding
                        Corrective Action</button>
                </div>
                <div class="flex-auto">
                    <button class="btn btn-error btn-block" wire:click='rejectCorrectiveAction' wire:loading.class="loading" wire:target='rejectCorrectiveAction'>Reject Finding
                        Corrective Action</button>
                </div>
            </div>
        </div>
    @else
        <div class="bg-gray-200 p-2 border  border-opacity-90 shadow-sm">
            <div class="btn btn-warning btn-block" wire:click='removeFinding' wire:loading.class="loading" wire:target='removeFinding' > Remove as a Factor </div>
        </div>
    @endif
</div>
