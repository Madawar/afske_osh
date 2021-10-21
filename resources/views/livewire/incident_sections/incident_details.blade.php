<div class="w-auto m-8 text-gray-800 bg-white divide-y divide-gray-300 rounded-lg shadow-md sm:m-4">
    <div class="flex items-start px-6 py-5">
        <h2 class="mr-auto">
            <span class="block font-sans text-2xl font-semibold text-gray-900 ">Incident Details</span>
            <span class="block font-light text-gray-800">Please Describe in Details the incident or hazard observed<span>
        </h2>
    </div>
    <div class=" px-6 py-4">
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">

            <div class="flex-auto">

                <x-forms.input label="Date Of Incident" placeholder="Date Of Incident" wire:model="incident.date" class="date" name="incident.date" />
            </div>
            <div class="flex-auto">
                <x-forms.input label="Time Of Incident" placeholder="Time Of Incident" wire:model="incident.time" class="time" name="incident.time" />
            </div>
            <div class="flex-auto">
                <x-forms.input label="Location Of Incident" placeholder="Location Of Incident" wire:model="incident.location"
                    name="incident.location" />

            </div>


        </div>

        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">

            <div class="flex-auto">
                <!-- TODO Include Incident Types -->
                <x-forms.select :options="$incident_types" label="Incident Type" placeholder="incident_type"
                    wire:model="incident.incident_type" name="incident.incident_type" />
            </div>
            <div class="flex-auto">
                <x-forms.input label="Flight Affected" placeholder="Flight Affected" wire:model="incident.flight"
                    name="incident.flight" />
            </div>
            <div class="flex-auto">
                <x-forms.input label="Operational Impact" placeholder="operational_impact"
                    wire:model="incident.operational_impact" name="incident.operational_impact" />
            </div>

        </div>

        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">

            <div class="flex-auto">
                <x-forms.textarea label="Narration Of Incident" placeholder="Narration Of Incident"
                    wire:model="incident.narration" name="incident.narration" />
            </div>

        </div>
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">
                <x-forms.textarea label="Immediate Corrective Action Taken"
                    placeholder="Immediate Corrective Action Taken" wire:model="incident.immediate_corrective_action"
                    name="incident.immediate_corrective_action" />
            </div>
        </div>

    </div>

</div>
