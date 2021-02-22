<div class="flex flex-col md:flex-row  flex-wrap md:divide-x divide-gray-50  border border-gray-300 mb-2">
    <div class="flex-none w-72 bg-gray-50 border-r border-gray-300">
        <h1 class="text-center underline leading-loose tracking-widest font-extrabold">Equipment Involved in Accident
        </h1>
        <p class="font-sans p-2 leading-loose">
            Please enter details of any equipment that was involved in the incident
        </p>
    </div>

    <div class="flex flex-auto flex-col md:flex-row md:space-x-5  p-2 ">
        <div class="flex flex-col flex-auto">
            <div class="flex flex-row flex-auto space-x-5">
                <div class="flex-auto">
                    <div class=" focus-within:text-gray-600 text-gray-400">
                        <input type="text" placeholder="Vehicle Make Model" wire:model="model"
                            class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('model') border-red-500 @enderror">
                        @error('model') <div class="text-red-600">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="flex-auto">
                    <div class=" focus-within:text-gray-600 text-gray-400">
                        <input type="text" placeholder="Vehicle Registration" wire:model="registration"
                            class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('registration') border-red-500 @enderror">
                        @error('registration') <div class="text-red-600">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="flex-auto">
                    <div class=" focus-within:text-gray-600 text-gray-400">
                        <input type="text" placeholder="Damage Caused Or Incured by Vehicle" wire:model="damage"
                            class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300  focus:outline-none text-gray-600 @error('damage') border-red-500 @enderror">
                        @error('damage') <div class="text-red-600">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="flex-none w-48 text-right">
                    <button wire:click="addVehicle"
                        class="mt-1 inline-block px-6 py-0 text-xs font-medium leading-6 text-center text-green-500 uppercase transition bg-transparent border-2 border-green-500 rounded ripple hover:bg-green-100 focus:outline-none">Add
                        Vehicle</button>
                </div>
            </div>
            <hr class="mt-2"/>
            <div class="flex flex-row flex-auto space-x-5">
                <table class=" m-5 w-5/6 mx-auto bg-gray-200 text-gray-800"">
                    <thead>
                      <tr class=" text-left border-b-2 border-gray-300">
                    <th class=" text-left border-b-2 border-gray-300">Model</th>
                    <th class=" text-left border-b-2 border-gray-300">Registration</th>
                    <th class=" text-left border-b-2 border-gray-300">Damages</th>
                    <th class=" text-left border-b-2 border-gray-300">Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if ($vehicles != null)
                            @foreach ($vehicles as $vehicle)
                                <tr class="bg-gray-100 border-b border-gray-200">
                                    <td class="px-4 py-3">{{ $vehicle['model'] }}</td>
                                    <td class="px-4 py-3">{{ $vehicle['registration'] }}</td>
                                    <td class="px-4 py-3">{{ Str::limit($vehicle['damage'], 20)  }}</td>
                                    <td class="px-4 py-3"> <button
                                            wire:click="removeVehicle({{ $loop->index }})">Remove</button></td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>

            </div>



        </div>


    </div>

</div>
