<div class="flex flex-col md:flex-row  flex-wrap md:divide-x divide-gray-50  border border-gray-300 mb-2">
    <div class="flex-none w-72 bg-gray-50 border-r border-gray-300">
        <h1 class="text-center underline leading-loose tracking-widest font-extrabold">Findings</h1>
        <p class="font-sans p-2 leading-loose">

        </p>
    </div>


    <div class="flex flex-auto flex-col md:flex-row md:space-x-5  p-2 ">
        <div class="flex-auto flex-col">
            <div class="flex flex-col">
                <label class="leading-loose">Root Cause:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <textarea placeholder="Root Cause" rows="4"
                        class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600"></textarea>
                </div>
            </div>
            <div class="flex flex-col">
                <label class="leading-loose">Findings:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <textarea placeholder="Root Cause" rows="4"
                        class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600"></textarea>
                </div>
            </div>
        </div>

        <div class="flex-auto flex-col">
            <div class="flex flex-col">
                <label class="leading-loose">Corrective Action:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <textarea placeholder="Corrective Action" rows="4"
                        class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600"></textarea>
                </div>
            </div>


            <div class="flex flex-col">
                <div class="grid justify-items-stretch">
                    <div class="justify-self-center">
                        <button wire:click="closeIncident({{ $incident_id }})"
                            class="inline-block mt-16 px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none">
                            Close Incident
                        </button>

                    </div>
                </div>
            </div>

        </div>



    </div>

</div>
