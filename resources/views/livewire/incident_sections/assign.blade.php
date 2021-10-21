<div class="w-auto m-8 text-gray-800 bg-white divide-y divide-gray-300 rounded-lg shadow-md sm:m-4">
    <div class="flex items-start px-6 py-5">
        <h2 class="mr-auto">
            <span class="block font-sans text-2xl font-semibold text-gray-900 ">Assign To Manager</span>
            <span class="block font-light text-gray-800">Please Enter Details Of Person to close out<span>
        </h2>
    </div>
    <div class=" px-6 py-4">
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">

            <div class="flex-auto">
                <x-forms.input label="Name Of Manager Assigned To" placeholder="Assigned To" wire:model="incident.assigned_to_name"
                    name="incident.assigned_to_name" />
            </div>
            <div class="flex-auto">
                <x-forms.input label="Email Of Person Assigned To" placeholder="Email Of Person Assigned To"
                    wire:model="incident.assigned_to_email" name="incident.assigned_to_email" />
            </div>


        </div>
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">

            <div class="flex-auto">
                <x-forms.select label="Risk Level" placeholder="Risk Level" wire:model="incident.risk_level"
                    name="incident.risk_level" :options="$risk_levels" />
            </div>
            <div class="flex-auto">
                <x-forms.select label="Finding Level" placeholder="Finding Level" wire:model="incident.finding_level"
                    name="incident.finding_level" :options="$finding_levels" />
            </div>



        </div>
 <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
        <div class="grid justify-items-stretch">
                <div class="justify-self-center">
                    <button wire:click="assignToManager({{ $incident->id }})"
                        class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none">
                        Assign to Manager
                    </button>
                    <div class="flex items-center bg-blue-900 text-white text-sm font-bold px-4 py-3" wire:loading
                        wire:target="assignToManager">

                    </div>

                </div>
            </div>
            </div>

    </div>


</div>


