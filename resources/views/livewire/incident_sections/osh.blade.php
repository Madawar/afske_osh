<div id="close"
    class="flex flex-col md:flex-row  flex-wrap md:divide-x divide-gray-50  border border-gray-300 mb-2 mt-2">
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
                            <input type="text" placeholder="Loss in Time Injury" wire:model="incident.lti"
                                class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('lti') border-red-500 @enderror">
                            @error('incident.lti') <div class="error">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="flex-auto">
                    <div class="flex flex-col">
                        <label class="leading-loose">Cost:</label>
                        <div class=" focus-within:text-gray-600 text-gray-400">
                            <input type="text" placeholder="Cost" wire:model="incident.cost"
                                class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('cost') border-red-500 @enderror">
                            @error('incident.cost') <div class="error">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="flex-auto">
                    <div class="flex flex-col">
                        <label class="leading-loose">Risk Level:</label>
                        <div class=" focus-within:text-gray-600 text-gray-400">
                            <select type="text" placeholder="Risk Level" wire:model="incident.risk_level"
                                class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('risk_level') border-red-500 @enderror">
                                <option>Please Choose</option>
                                <option value="1A">1A</option>
                                <option value="1B">1B</option>
                                <option value="1C">1C</option>
                                <option value="1D">1D</option>
                                <option value="1E">1E</option>

                                <option value="2A">2A</option>
                                <option value="2B">2B</option>
                                <option value="2C">2C</option>
                                <option value="2D">2D</option>
                                <option value="2E">2E</option>

                                <option value="5A">3A</option>
                                <option value="3B">3B</option>
                                <option value="3C">3C</option>
                                <option value="3D">3D</option>
                                <option value="3E">3E</option>

                                <option value="5A">5A</option>
                                <option value="5B">5B</option>
                                <option value="5C">5C</option>
                                <option value="5D">5D</option>
                                <option value="5E">5E</option>

                                <option value="5A">5A</option>
                                <option value="5B">5B</option>
                                <option value="5C">5C</option>
                                <option value="5D">5D</option>
                                <option value="5E">5E</option>
                            </select>
                            @error('incident.risk_level') <div class="error">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row md:space-x-5">
                <div class="flex-auto">
                    <div class="flex flex-col">
                        <label class="leading-loose">Incident Status:</label>
                        <div class=" focus-within:text-gray-600 text-gray-400">
                            <select type="text" placeholder="Risk Level" wire:model="incident.finalized"
                                class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('finalized') border-red-500 @enderror">
                                <option>Please Choose</option>
                                <option value="0">Unsatisfactory</option>
                                <option value="1">Finalized</option>
                            </select>
                            @error('incident.finalized') <div class="error">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="flex-auto">

                </div>
            </div>
            <div class="flex flex-col">
                <label class="leading-loose">Review Of Root Cause:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <textarea placeholder="Root Cause" rows="4" wire:model="incident.review_of_root_cause"
                        class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('review_of_root_cause') border-red-500 @enderror"></textarea>
                    @error('incident.review_of_root_cause') <div class="error">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="flex flex-col mt-5">
                <div class="grid justify-items-stretch">
                    <button wire:click="oshReview({{ $incident->id }})"
                        class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none">
                        @if ($incident->finalized == 1)
                            Close Incident.
                        @else
                            Revert Incident for further action
                        @endif
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
