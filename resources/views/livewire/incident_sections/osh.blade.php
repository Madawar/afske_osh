<div class="flex flex-col md:flex-row  flex-wrap md:divide-x divide-gray-50  border border-gray-300 mb-2 mt-2">
    <div class="flex-none w-72 bg-gray-50 border-r border-gray-300">
        <h1 class="text-center underline leading-loose tracking-widest font-extrabold">OSH Review
        </h1>
        <p class="font-sans p-2 leading-loose">
            Final Osh Comments
        </p>
    </div>

    <div class="flex flex-auto flex-col md:flex-row space-x-5 flex-wrap p-2 ">
        <div class="flex-auto">
            <div class="flex flex-col md:flex-row md:space-x-5">
                <div class="flex-auto">
                    <div class="flex flex-col">
                        <label class="leading-loose">LTI:</label>
                        <div class=" focus-within:text-gray-600 text-gray-400">
                            <input type="text" placeholder="Loss in Time Injury" wire:model="lti"
                                class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('lti') border-red-500 @enderror">
                            @error('lti') <div class="error">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="flex-auto">
                    <div class="flex flex-col">
                        <label class="leading-loose">Cost:</label>
                        <div class=" focus-within:text-gray-600 text-gray-400">
                            <input type="text" placeholder="Cost" wire:model="cost"
                                class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('cost') border-red-500 @enderror">
                            @error('cost') <div class="error">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="flex-auto">
                    <div class="flex flex-col">
                        <label class="leading-loose">Risk Level:</label>
                        <div class=" focus-within:text-gray-600 text-gray-400">
                            <select type="text" placeholder="Risk Level" wire:model="risk_level"
                                class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('risk_level') border-red-500 @enderror">

                            </select>
                            @error('risk_level') <div class="error">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row md:space-x-5">
                <div class="flex-auto">
                    <div class="flex flex-col">
                        <label class="leading-loose">Incident Status:</label>
                        <div class=" focus-within:text-gray-600 text-gray-400">
                            <select type="text" placeholder="Risk Level" wire:model="finalized"
                                class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('finalized') border-red-500 @enderror">
                                <option value="0">Unsatisfactory</option>
                                <option value="1">Finalized</option>
                            </select>
                            @error('finalized') <div class="error">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="flex-auto">

                </div>
            </div>
            <div class="flex flex-col">
                <label class="leading-loose">Review Of Root Cause:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <textarea placeholder="Root Cause" rows="4" wire:model="review_of_root_cause"
                        class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('review_of_root_cause') border-red-500 @enderror"></textarea>
                    @error('review_of_root_cause') <div class="error">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="flex flex-col">
                <div class="justify-self-center">
                    <button wire:click="oshReview({{ $incident_id }})"
                        class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none">
                        Update Incident
                    </button>
                    <div class="flex items-center bg-blue-900 text-white text-sm font-bold px-4 py-3" wire:loading
                        wire:target="oshReview">
                        Saving Review
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>