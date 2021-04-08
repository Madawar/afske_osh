<table class="table-auto w-full">
    <thead>
        <tr class="bg-gray-400">
            <th class="pr-5 pl-5 border-r border-t border-l border-gray-300 prose">Audit Item</th>
            <th class="pr-5 pl-5  border-r border-t border-gray-300 prose">Yes</th>
            <th class="pr-5 pl-5  border-r border-t border-gray-300 prose">No</th>
            <th class="pr-5 pl-5  border-r border-t border-gray-300 prose">N/A</th>
            <th class="pr-5 pl-5  border-r border-t border-gray-300 prose">Findings</th>

            <th class="pr-5 pl-5  border-r border-t border-gray-300 prose">Non Conformity Level</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($audit->AuditItems->groupBy('subcategory') as $key => $item)
            <tr>
                <td class="p-1 border border-r border-gray-50 text-center bg-blue-700 text-white" colspan="7">
                    {{ $key }}</td>
            </tr>
            @foreach ($item as $ll)
                <tr>
                    <td>{{ $ll->item }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
            @endforeach

        @endforeach


    </tbody>
</table>
