<div>

    @include('livewire.incident_sections.personal_details')
    @include('livewire.incident_sections.incident_details')
    @include('livewire.incident_sections.equipment_details')
    @include('livewire.incident_sections.injury_details')

    <div class="grid justify-items-stretch">
        <div class="justify-self-center">
            <button wire:click="saveReport"
            class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none">Save Incident
            Report</button>

        </div>
      </div>


    @include('livewire.incident_sections.findings')
    @include('livewire.incident_sections.osh')

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
