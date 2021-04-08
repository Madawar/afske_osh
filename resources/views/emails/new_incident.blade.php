<div>
    <p>
        Thanks <b>{{ $incident->reporter }}</b> for reporting incident: <b>{{ $incident->incident_no }}</b>.
    </p>

    <p>
        Incident occured at <b>{{ $incident->location }}</b> on <b>{{ $incident->date }}</b> at
        <b>{{ $incident->time }}</b>. <br /><br />
        Below is what occured as reported: <br /><br />
        <b>{{ $incident->narration }}</b>
        <br /><br />
        Below corrective action was taken: <br /><br />
        <b>{{ $incident->immediate_corrective_action }}</b>
    </p>

    If you need to edit anything kindly click below
    <br /><br />
    <a href="{{ env('APP_URL') }}?edit={{$incident->id}}">Amend Incident</a>
    <br /><br />
    <b>Copy the link below to your browser if you have any issue with clicking the above</b><br />
    {{ env('APP_URL') }}?edit={{ $incident->id }}
</div>
