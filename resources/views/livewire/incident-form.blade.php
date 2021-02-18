<div>

    @include('livewire.incident_sections.personal_details')
    @include('livewire.incident_sections.incident_details')
    @include('livewire.incident_sections.equipment_details')
    @include('livewire.incident_sections.injury_details')

    @if($incident_id == null )
    <div class="grid justify-items-stretch">
        <div class="justify-self-center">
            <button wire:click="saveReport"
                class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none">Save
                Incident
                Report</button>

        </div>
    </div>
    @elseif( Auth::user()->account_type == 'osh')
    <div class="grid justify-items-stretch">
    <div class="justify-self-center">
        <button wire:click="updateReport"
            class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none">Update
            Incident
            Report</button>

    </div>
    </div>
    @endif

    @if (Auth::user())
        @if (Auth::user()->account_type == 'osh')
            @include('livewire.incident_sections.assign')
        @endif
        @if (Auth::user()->account_type == 'manager')
            @include('livewire.incident_sections.findings')
        @endif
        @if (Auth::user()->account_type == 'osh')
            @include('livewire.incident_sections.osh')
        @endif
    @endif

    <script>
        document.addEventListener('livewire:load', function() {
            flatpickr(".date");
            flatpickr(".time", {
                noCalendar: true,
                enableTime: true,
                time_24hr: true,
                dateFormat: 'h:i'
            });
        })

    </script>
</div>
