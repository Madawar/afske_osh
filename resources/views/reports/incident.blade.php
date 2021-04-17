<style>
    table,
    th,
    td {
        border: 1px solid black;
    }

</style>
<table class="table-auto w-full">
    <thead>
        <tr class="bg-gray-400">
            <th style="border: 1px solid black;">Incident Number</th>
            <th style="border: 1px solid black;">Status</th>
            <th style="border: 1px solid black;">Assigned to</th>
            <th style="border: 1px solid black;">Reporter</th>
            <th style="border: 1px solid black;">Department</th>
            <th style="border: 1px solid black;">Date</th>
            <th style="border: 1px solid black;">Location</th>
            <th style="border: 1px solid black;">Incident Type</th>
            <th style="border: 1px solid black;">Narration</th>
            <th style="border: 1px solid black;">Immediate Corrective Action</th>
            <th style="border: 1px solid black;">Root Cause</th>
            <th style="border: 1px solid black;">Corrective Actions</th>
            <th style="border: 1px solid black;">Findings</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($incidents as $incident)
            <tr>
                <td style="border: 1px solid black;">{{ $incident->incident_no }}</td>
                @if ($incident->finalized == 1)
                    <td style="background-color: green">
                    @else

                    <td style="background-color: red">
                @endif
                @if ($incident->finalized)
                    Closed
                @else
                    Open
                @endif
                </td>
                @if ($incident->assigned_to_name != null)
                    <td style="border: 1px solid black;">
                    @else
                    <td style="background-color: red">
                @endif

                @if ($incident->assigned_to_name != null)
                    {{ $incident->assigned_to_name }} ({{ $incident->assigned_to_email }})
                @else
                    <span>unnasigned</span>
                @endif

                </td>
                <td style="border: 1px solid black;">{{ $incident->reporter }} ({{ $incident->pno }})</td>
                <td style="border: 1px solid black;">{{ $incident->department->name }} </td>
                <td style="border: 1px solid black;"> {{ Carbon\Carbon::parse($incident->date)->format('j-M-y') }} </td>
                <td style="border: 1px solid black;"> {{ $incident->location }} </td>
                <td style="border: 1px solid black;"> {{ $incident->incident_type }} </td>
                <td style="border: 1px solid black;"> {{ $incident->narration }} </td>
                <td style="border: 1px solid black;"> {{ $incident->immediate_corrective_action }} </td>
                <td style="border: 1px solid black;"> {{ $incident->root_cause }} </td>
                <td style="border: 1px solid black;"> {{ $incident->corrective_action }} </td>
                <td style="border: 1px solid black;"> {{ $incident->findings }} </td>
            </tr>


        @endforeach


    </tbody>
</table>
