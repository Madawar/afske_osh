<div id="findings" class="flex flex-col md:flex-row  flex-wrap md:divide-x divide-gray-50  border border-gray-300 mb-2">
    <div class="flex-none w-72 bg-gray-50 border-r border-gray-300">
        <h1 class="text-center underline leading-loose tracking-widest font-extrabold">Findings</h1>
        <p class="font-sans p-2 leading-loose">
            Hi <b>{{ Auth::user()->name }}</b>, <br />
            To fill a good root cause analysis please keep the below in mind: - <br />
        <ol class="list-decimal ml-5 leading-loose">
            <li>What conditions allow the problem to occur? [E.g., traditional values and practices]</li>
            <li>What problems co-exist with the central problem and might contribute to it?</li>
            <li>What sequence of events leads to the problem?</li>
        </ol>

        </p>
    </div>


    <div class="flex flex-auto flex-col   p-2 ">
        <div class="flex flex-row flex-auto  md:space-x-5 ">
            <div class="flex flex-col flex-auto">
                <label class="leading-loose">Root Cause:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <textarea placeholder="Root Cause" rows="4" wire:model="root_cause"
                        class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600  @error('root_cause') border-red-500 @enderror"></textarea>
                    @error('root_cause') <div class="text-red-600">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="flex flex-col flex-auto">
                <label class="leading-loose">Corrective Action:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <textarea placeholder="Corrective Actions" rows="4" wire:model="corrective_action"
                        class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('corrective_action') border-red-500 @enderror"></textarea>
                    @error('corrective_action') <div class="text-red-600">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>




        <div class="flex-auto flex-col">
            <div class="flex flex-col">
                <label class="leading-loose">Finding:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <textarea placeholder="Findings" rows="4" wire:model="findings"
                        class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('findings') border-red-500 @enderror"></textarea>
                    @error('findings') <div class="text-red-600">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="flex flex-row">
                @include('livewire.incident_sections.evidence')
            </div>

            @if (Auth::user()->account_type != 'osh')
                <div class="flex flex-col">
                    <div class="grid justify-items-stretch">
                        <div class="justify-self-center">
                            <button wire:click="closeIncident({{ $incident_id }})"
                                class="inline-block mt-16 px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none">
                                Submit Findings and Evidence to OSH Department
                            </button>

                            <div class="flex items-center bg-blue-900 text-white text-sm font-bold px-4 py-3"
                                wire:loading wire:target="closeIncident">
                                Closing Incident
                            </div>

                        </div>
                    </div>
                </div>
            @endif

        </div>



    </div>

</div>
