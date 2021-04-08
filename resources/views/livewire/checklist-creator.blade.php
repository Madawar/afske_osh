<div>
    <x-forms.t-input label="Checklist Name" placeholder="Give Your Checklist A Name" name="name" />
    <div class="flex-col p-2 w-full">
        <div class="grid justify-items-stretch">
            @if ($checklist_id != null)
                <x-forms.t-button-ok text="create" wire:click="updateChecklist({{ $checklist_id }})" />

            @else
                <x-forms.t-button-ok text="create" wire:click="SaveChecklist" />
            @endif
            <div class="" wire:loading wire:target="updateChecklist">
                Please Wait ...
            </div>
            <div class="" wire:loading wire:target="SaveChecklist">
                Please Wait ...
            </div>
        </div>
    </div>

    @if ($checklist_id != null)
        <div class="border border-gray-200 mt-2">
            <h1 class="text-center border-b border-gray-200 p-5 text-xl">Your Checklist</h1>
            <div class="flex flex-row p-2 space-x-3">
                <div class="flex flex-auto w-full">
                    <x-forms.t-input label="Checklist Item" placeholder="Checklist Item" name="item" />
                </div>
                <div class="flex flex-auto w-full">
                    <x-forms.t-input label="Sub Category" placeholder="Sub Category" name="subcategory" />
                </div>
                <div class="flex flex-auto w-full">
                    <x-forms.t-select label="Required Response" placeholder="Give Your Checklist A Name"
                        name="required_response" :options="['1'=>'Yes',0=>'No','N/A'=>'N/A']" />
                </div>
                <div class="flex flex-auto w-full">
                    <x-forms.t-button-ok text="Add Checklist Item" wire:click="AddChecklistItem" />
                </div>
            </div>
            <div class="row">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-gray-400">
                            <th class="pr-5 pl-5 border-r border-t border-l border-gray-300">CheckList Item</th>
                            <th class="pr-5 pl-5  border-r border-t border-gray-300">Response</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($checklist_id != null)
                            @foreach ($list->ChecklistItems->groupBy('subcategory') as $key => $item)
                                <tr>
                                    <td class="p-1 border border-r border-gray-50 text-center bg-blue-700 text-white"
                                        colspan="2">{{ $key }}</td>
                                </tr>
                                @foreach ($item as $ll)
                                    <tr class=>
                                        <td class="p-3 border border-r border-gray-50">{{ $ll->item }}</td>
                                        <td class="p-3 border border-r border-gray-50">{{ $ll->required_response }}
                                        </td>

                                    </tr>
                                @endforeach

                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
