<div class="w-auto m-8 text-gray-800 bg-white divide-y divide-gray-300 rounded-lg shadow-md sm:m-4">
    <div class="flex items-start px-6 py-5">
        <h2 class="mr-auto">
            <span class="block font-sans text-2xl font-semibold text-gray-900 ">Equipment Involved in Accident</span>
            <span class="block font-light text-gray-800">Please enter details of any equipment that was involved in the
                incident, you can add Multiple Vehicles</span>
        </h2>
    </div>
    <div class=" px-6 py-4">
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">

            <div class="flex-auto">
                <x-forms.input label="Vehicle Model" placeholder="Vehicle Model" wire:model="model" name="model" />
            </div>
            <div class="flex-auto">
                <x-forms.input label="Vehicle Registration" placeholder="registration" wire:model="registration"
                    name="registration" />
            </div>


        </div>

        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">
                <x-forms.textarea label="Vehicle Damage or Damage Incured" placeholder="damage" wire:model="damage"
                    name="damage" />
            </div>
        </div>

        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">
                <button wire:click="addVehicle" class="btn btn-block">Add Vehicle Damage</button>
            </div>
        </div>

    </div>
    <div class="px-6 py-2 font-light text-gray-600">
        <span class="font-semibold text-black"></span>
        <table class=" table w-full table-compact">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>Registration</th>
                    <th>Damages</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @isset ($this->incident->vehicles )
                    @foreach ($this->incident->vehicles as $vehicle)
                        <tr>
                            <td>{{ $vehicle['model'] }}</td>
                            <td>{{ $vehicle['registration'] }}</td>
                            <td>{{ Str::limit($vehicle['damage'], 20) }}</td>
                            <td> <button class="btn btn-sm btn-error"
                                    wire:click="removeVehicle({{ $loop->index }})">Remove</button></td>
                        </tr>
                    @endforeach
                @endisset

            </tbody>
        </table>

    </div>

</div>
