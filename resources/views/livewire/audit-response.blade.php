
    @if ($item->non_conformity == 1)
        <tr class="bg-red-200">
        @else
        <tr class="">
    @endif
    <td class="p-3 border border-r border-gray-50 prose w-64">{{ $item->item }}</td>
    <td class="p-3 border border-r border-gray-50 prose w-64">{{ $item->finding }}</td>
    <td class="p-3 border border-r border-gray-50 w-64">
        <x-forms.t-textarea label="" placeholder="Root Cause" name="item.root_cause" />
    </td>
    <td class="p-3 border border-r border-gray-50 w-64">
        <x-forms.t-textarea label="" placeholder="Root Cause Correction" name="item.root_cause_correction" />
    </td>




    <td class="p-3 border border-r border-gray-50 w-20">

    </td>

    </tr>


