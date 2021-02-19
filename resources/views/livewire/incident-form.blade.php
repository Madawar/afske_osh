<div>

    @include('livewire.incident_sections.personal_details')
    @include('livewire.incident_sections.incident_details')
    @include('livewire.incident_sections.equipment_details')
    @include('livewire.incident_sections.injury_details')

    @if ($incident_id == null)
        <div class="grid justify-items-stretch">
            <div class="justify-self-center">
                <button wire:click="saveReport"
                    class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none">Save
                    Incident
                    Report</button>
                <div class="flex items-center bg-blue-900 text-white text-sm font-bold px-4 py-3" wire:loading
                    wire:target="saveReport">
                    Saving Report
                </div>
            </div>

        </div>
    @elseif( Auth::check())
        @if (Auth::user()->account_type == 'osh')
            <div class="grid justify-items-stretch">
                <div class="justify-self-center">
                    <button wire:click="updateReport"
                        class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none">Update
                        Incident
                        Report</button>
                    <div class="flex items-center bg-blue-900 text-white text-sm font-bold px-4 py-3" wire:loading
                        wire:target="updateReport">
                        Updating Report
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="grid justify-items-stretch">
            <div class="justify-self-center">
                <button wire:click="updateReport"
                    class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none">Update
                    Incident
                    Report</button>
                <div class="flex items-center bg-blue-900 text-white text-sm font-bold px-4 py-3" wire:loading
                    wire:target="updateReport">
                    Updating Report
                </div>
            </div>
        </div>
    @endif

    @if (Auth::check())
        @if (Auth::user()->account_type == 'osh' and $incident_id != null)
            @include('livewire.incident_sections.assign')
        @endif
        @if ((Auth::user()->account_type == 'manager' or Auth::user()->account_type == 'osh') and $incident_id != null)
            @include('livewire.incident_sections.findings')
        @endif
        @if (Auth::user()->account_type == 'osh' and $incident_id != null)
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
            Livewire.on('message', postId => {
                MicroModal.show('modal-1');
            });
        })

    </script>

    @include('livewire.incident_sections.modal')
</div>
