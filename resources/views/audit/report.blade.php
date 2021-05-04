<table>
    <tbody>
        <tr>
            <td>Audit Name : <b>{{ $audit->audit_name }}</b></td>

        </tr>
        <tr>
            <td>Audit Done on :<b>{{ $audit->doneOn }}</b></td>

        </tr>
        <tr>
            <td>Audit Number :<b>{{ $audit->audit_no }}</b></td>

        </tr>
        <tr>
            <td>Interviewed :<b>{{ $audit->interviewed }}</b></td>

        </tr>
        <tr>
            <td>Department :<b>{{ $audit->dep->name }}</b></td>
        </tr>

    </tbody>

</table>

<table class="table-auto w-full">
    <thead>
        <tr class="bg-gray-400">
            <th style="border: 1px solid black;">Audit Item</th>
            <th style="border: 1px solid black;">Yes</th>
            <th style="border: 1px solid black;">No</th>
            <th style="border: 1px solid black;">N/A</th>
            <th style="border: 1px solid black;">Findings</th>
            <th style="border: 1px solid black;">Non Conformity Level</th>
            <th style="border: 1px solid black;">CAPA</th>
            <th style="border: 1px solid black;">Root Cause</th>
            <th style="border: 1px solid black;">Root Cause Correction</th>
            <th style="border: 1px solid black;">Close Gap</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($audit->AuditItems->groupBy('subcategory') as $key => $item)
            <tr>
                <td style="text-align: center; background-color:blue;" colspan="10">
                    {{ $key }}</td>
            </tr>
            @foreach ($item as $ll)
                <tr>
                    <td style="border: 1px solid black;">{{ $ll->item }}</td>
                    <td style="border: 1px solid black;">
                        @if ($ll->response == 1)
                            Yes
                        @endif
                    </td>
                    <td style="border: 1px solid black;">
                        @if ($ll->response == 0)
                            Yes
                        @endif
                    </td>
                    <td style="border: 1px solid black;">
                        @if ($ll->response == 'N/A')
                            Yes
                        @endif
                    </td>
                    <td style="border: 1px solid black;">{{ $ll->finding }}</td>
                    <td style="border: 1px solid black;">{{ $ll->conformity_level }}</td>
                    <td style="border: 1px solid black;">{{ $ll->capa_number }}</td>
                    <td style="border: 1px solid black;">{{ $ll->root_cause }}</td>
                    <td style="border: 1px solid black;">{{ $ll->root_cause_correction }}</td>
                    <td style="border: 1px solid black;">{{ $ll->close_gap }}</td>

                </tr>
            @endforeach

        @endforeach


    </tbody>
</table>
