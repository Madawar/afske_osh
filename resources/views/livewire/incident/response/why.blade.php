
    <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
        <div class="flex-auto">
            <x-forms.input label="" placeholder="Why" wire:model="analysis.why" class="input-sm" name="Why" />
        </div>
        <div class="flex-auto">
            <x-forms.input label="" placeholder="Containment" class="input-sm" wire:model="analysis.containment"
                name="Containment" />
        </div>
        <div class="">
            <button class="btn btn-sm btn-circle btn-error" wire:click='removeItem()' wire:target="removeItem"
                wire:loading.class="loading">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block w-6 h-6 stroke-current" wire:loading.remove wire:target="removeItem">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
    </div>

