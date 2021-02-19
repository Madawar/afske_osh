<div>
    <p>
        Incident : <b>{{ $incident->incident_no }}</b>, has a response.
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

    <p>
        Root Cause: <br /><br />
        <b>{{ $incident->root_cause }}</b>
        <br /><br />
        Findings: <br /><br />
        <b>{{ $incident->findings }}</b>
        <br /><br />
        Corrective Action: <br /><br />
        <b>{{ $incident->corrective_action }}</b>
    </p>


    Kindly click the below link to close out this Incident
    <br /><br />

</div>
