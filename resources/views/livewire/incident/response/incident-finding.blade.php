<div>

    <div class=" m-2 mb-3 border  border-opacity-90 filter md:drop-shadow-sm border-gray-300 ">
        <div class=" bg-gray-50  border-b  border-opacity-90">
            <div class=" flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
                <div class="flex-auto">
                    <x-forms.input label="Contributing Factor" placeholder="Finding" wire:model="finding.factor"
                        disabled name="factor" />
                </div>
            </div>
            <div
                class="w-full text-center text-center text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
                5-Why Analysis</div>
            @foreach ($analysis as $item)
                <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
                    <div class="flex-auto">
                        <x-forms.input label="" placeholder="{{ $loop->index + 1 }} Why" wire:model="analysis.{{$loop->index}}.why"
                            class="input-sm" name="corrective_action" />
                    </div>
                    <div class="flex-auto">
                        <x-forms.input label="" placeholder="Containment" class="input-sm" wire:model="analysis.{{$loop->index}}.containment"
                            name="corrective_action" />
                    </div>
                    <div class="">
                        <button class="btn btn-sm btn-circle btn-error" wire:click='removeItem({{$loop->index}})' wire:target="removeItem" wire:loading.class="loading" >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current" wire:loading.remove wire:target="removeItem">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                          </button>
                    </div>
                </div>
            @endforeach
            <div class="w-full text-center" >
                <button class="btn btn-circle btn-primary" wire:target=" addAnalysis" wire:loading.class="loading" wire:click='addAnalysis'>
                    <svg xmlns="http://www.w3.org/2000/svg" wire:loading.remove wire:target=" addAnalysis" class="inline-block w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>

                  </button>
            </div>
            <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
                <div class="flex-auto">
                    <x-forms.textarea label="Corrective Action" placeholder="Finding"
                        wire:model="finding.corrective_action"  name="corrective_action" />
                </div>
            </div>
        </div>
        <div class="bg-gray-200 p-2">
            OSH
            <div class=" flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
                <div class="flex-auto">
                    <x-forms.input label="OSH Remarks" placeholder="Osh Remarks" wire:model="finding.osh_remarks"
                        name="factor" />
                </div>
            </div>
            <div class=" flex flex-col md:flex-row  md:space-x-1 md:space-y-0 space-y-1 w-full">
                <div class="flex-auto">
                    <button class="btn btn-success btn-block">Accept Finding Corrective Action</button>
                </div>
                <div class="flex-auto">
                    <button class="btn btn-error btn-block">Reject Finding Corrective Action</button>
                </div>
            </div>
        </div>
    </div>
</div>
