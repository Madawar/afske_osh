@if ($item->non_conformity == 1)
    <tr class="bg-red-200">
    @else
    <tr class=>
@endif
<td class="p-3 border border-r border-gray-50 prose w-64">{{ $item->item }}</td>
<td class="p-3 border border-r border-gray-50 text-center w-1">
    <x-forms.t-option label="" :name="$item->id" model="item.response" value=1 />
</td>
<td class="p-3 border border-r border-gray-50 text-center w-1">
    <x-forms.t-option label="" :name="$item->id" model="item.response" value=0 />
</td>
<td class="p-3 border border-r border-gray-50 text-center w-1">
    <x-forms.t-option label="" :name="$item->id" model="item.response" value="N/A" />
</td>
<td class="p-3 border border-r border-gray-50 w-64">
    <x-forms.t-textarea label="" placeholder="Finding Remarks" name="item.finding" />
</td>

<?php $levels = [
'Observation' => 'Observation',
'L1' => 'L1',
'L2' => 'L2',
'L3' => 'L3',
]; ?>
<td class="p-3 border border-r border-gray-50 w-20">
    <x-forms.t-select label="" placeholder="Choose Checklist" name="item.conformity_level" :options="$levels" />
</td>

</tr>

