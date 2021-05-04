<div class="p-2">
    <h1 class="leading-loose">{{ $item->item }}</h1>
    <hr class="mt-1 mb-1"/>
    <h2>Finding : <b>{{ $item->finding}}</b></h2>
    <hr class="mt-1 mb-1"/>
    <x-forms.t-textarea label="Root Cause" placeholder="Root Cause" name="item.root_cause" />
    <x-forms.t-textarea label="Root Cause Correction" placeholder="Root Cause Correction" name="item.root_cause_correction" />
    <x-forms.t-textarea label="Close Gap" placeholder="Close Gap" name="item.close_gap" />
    @include('livewire.incident_sections.evidence')
</div>
