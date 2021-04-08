<div>

    <div class="flex flex-row p-2 space-x-3">
        <div class="flex flex-auto w-full">
            <x-forms.t-input :label="'Audit Name'" :placeholder="'Audit Name'" name="audit_name"  />
        </div>
        <div class="flex flex-auto w-full">
            <x-forms.t-input :label="'Audit Entity'" :placeholder="'Audit Entity'" name="audit_entity"  />
        </div>

    </div>

    <div class="flex flex-row p-2 space-x-3">
        <div class="flex flex-auto w-full">
            <x-forms.t-select label="Department" placeholder="Departments" name="department" :options="$departments" />
        </div>
        <div class="flex flex-auto w-full">
            <x-forms.t-date label="Date" placeholder="Date" name="done_on" />
        </div>
        <div class="flex flex-auto w-full">
            <x-forms.t-select label="Auditee" placeholder="Auditee" name="auditee"
            :options="$users" />

        </div>
    </div>
    <div class="flex flex-row p-2 space-x-3">
        <div class="flex flex-auto w-full">
            <x-forms.t-input label="Interviewed" placeholder="Interviewed" name="interviewed" />
        </div>
        <div class="flex flex-auto w-full">
            <x-forms.t-select label="Checklist" placeholder="Choose Checklist" wire:change="checklistChanged"
                name="checklist_id" :options="$checklists" />
        </div>


    </div>
    <div class="flex flex-row p-2 space-x-3">
        <div class="flex flex-auto w-full">
            <x-forms.t-textarea :label="'Other Details'" :placeholder="'Other Details'" name="other_details" />
        </div>



    </div>

     <div class="flex-col p-2 w-full">
        <div class="grid justify-items-stretch">
            @if ($audit_id != null)
                <x-forms.t-button-ok text="create" wire:click="updateAudit({{ $checklist_id }})" />

            @else
                <x-forms.t-button-ok text="create" wire:click="saveAudit" />
            @endif
        </div>
    </div>

    <div class="">


        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-400">
                    <th class="pr-5 pl-5 border-r border-t border-l border-gray-300">Audit Item</th>
                    <th class="pr-5 pl-5  border-r border-t border-gray-300">Yes</th>
                    <th class="pr-5 pl-5  border-r border-t border-gray-300">No</th>
                    <th class="pr-5 pl-5  border-r border-t border-gray-300">N/A</th>
                    <th class="pr-5 pl-5  border-r border-t border-gray-300">Findings</th>
                </tr>
            </thead>
            <tbody>
                @if ($checklist_items != null)
                    @foreach ($checklist_items->ChecklistItems->groupBy('subcategory') as $key => $item)
                        <tr>
                            <td class="p-1 border border-r border-gray-50 text-center bg-blue-700 text-white"
                                colspan="5">{{ $key }}</td>
                        </tr>
                        @foreach ($item as $ll)
                            <tr class=>
                                <td class="p-3 border border-r border-gray-50">{{ $ll->item }}</td>
                                <td class="p-3 border border-r border-gray-50 text-center">
                                    <x-forms.t-option label="" model="item.response"  name="response" value=1 />
                                </td>
                                <td class="p-3 border border-r border-gray-50 text-center">
                                    <x-forms.t-option label="" model="item.response"  name="response" value=0 />
                                </td>
                                <td class="p-3 border border-r border-gray-50 text-center ">
                                    <x-forms.t-option label="" model="item.response"  name="response" value="N/A" />
                                </td>
                                <td class="p-3 border border-r border-gray-50">
                                    <x-forms.t-input label="" placeholder="Finding Remarks" name="finding" />
                                </td>

                            </tr>
                        @endforeach

                    @endforeach
                @endif
            </tbody>
        </table>

    </div>

    <script>
        document.addEventListener('livewire:load', function() {

            flatpickr(".date", {

                enableTime: true,
                time_24hr: true,

            });

        })

    </script>
</div>
