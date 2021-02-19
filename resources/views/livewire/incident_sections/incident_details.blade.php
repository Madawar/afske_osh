<div class="flex flex-col md:flex-row  flex-wrap md:divide-x divide-gray-50  border border-gray-300 mb-2">
    <div class="flex-none w-72 bg-gray-50 border-r border-gray-300 ">
        <h1 class="text-center underline leading-loose tracking-widest font-extrabold">Incident Details</h1>
        <p class="font-sans p-2 leading-loose">
            Hi <b>{{ explode(' ', $reporter)[0] }}</b>, <br />
            A good Incident report should include the below : - <br />
        <ol class="list-decimal ml-5 leading-loose">
            <li>Type of incident (injury, near miss, property damage, or theft)</li>
            <li>Location of Incident.</li>
            <li>Date of incident.</li>
            <li>Time of incident.</li>
            <li>Name of affected individual.</li>
            <li>A narrative description of the incident, including the sequence of events and results of the incident.
            </li>
        </ol>
        </p>
    </div>


    <div class="flex flex-auto flex-col md:flex-row space-x-5  p-2 ">
        <div class="flex-auto">
            <div class="flex flex-col">
                <label class="leading-loose">Date: </label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <input type="text" placeholder="Date" wire:model="date"
                        class="date pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('date') border-red-500 @enderror">
                    @error('date') <div class="error">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="flex flex-col">
                <label class="leading-loose">Location:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <input type="text" placeholder="Location" wire:model="location"
                        class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('location') border-red-500 @enderror">
                    @error('location') <div class="text-red-600">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="flex flex-col">
                <label class="leading-loose">Flight Affected:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <input type="text" placeholder="Flight Affected" wire:model="flight"
                        class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('flight') border-red-500 @enderror">
                    @error('flight') <div class="text-red-600">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="flex flex-col">
                <label class="leading-loose">Narration:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <textarea placeholder="Narration" rows="4" wire:model="narration"
                        class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('narration') border-red-500 @enderror"></textarea>
                    @error('narration') <div class="text-red-600">{{ $message }}</div> @enderror
                </div>
            </div>


        </div>
        <div class="flex-auto">
            <div class="flex flex-col">
                <label class="leading-loose">Time:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <input type="text" placeholder="Time" wire:model="time"
                        class="time pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('time') border-red-500 @enderror">
                    @error('time') <div class="text-red-600">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="flex flex-col">
                <label class="leading-loose">Incident Type:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <select type="text" placeholder="Location" wire:model="incident_type"
                        class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('incident_type') border-red-500 @enderror">
                        <option>Please Choose</option>
                        <option value="Employee injury incident">Employee injury incident</option>
                        <option value="Environmental incident">Environmental incident</option>
                        <option value="Property damage incident">Property damage incident</option>
                        <option value="Vehicle incident">Vehicle incident</option>
                        <option value="Fire incident">Fire incident</option>

                    </select>
                    @error('incident_type') <div class="text-red-600">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="flex flex-col">
                <label class="leading-loose">Operational Impact:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <input type="text" placeholder="How Did the incident affect Operations?"
                        wire:model="operational_impact"
                        class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('operational_impact') border-red-500 @enderror">
                    @error('operational_impact') <div class="text-red-600">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="flex flex-col">
                <label class="leading-loose">Immediate Corrective Action:</label>
                <div class=" focus-within:text-gray-600 text-gray-400">
                    <textarea placeholder="Immediate Corrective Course" rows="4"
                        wire:model="immediate_corrective_action"
                        class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('immediate_corrective_action') border-red-500 @enderror"></textarea>
                    @error('immediate_corrective_action') <div class="text-red-600">{{ $message }}</div> @enderror
                </div>
            </div>

        </div>


    </div>

</div>
