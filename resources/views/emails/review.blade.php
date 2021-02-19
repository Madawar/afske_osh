<div>
    <p>
        Your review for incident : <b>{{ $incident->incident_no }}</b>,
        was not sufficient</b>.
    </p>

    <p>
        <b>Below is what occured as reported:</b> <br /><br />
        <i>{{ $incident->narration }}</i>
        <br /><br />
        <b>Below corrective action was taken:</b> <br /><br />
        <i>{{ $incident->immediate_corrective_action }}</i>
    </p>

    <p>
        You response for the incident was: <br /><br />
        <b>Root cause</b>
        <br /><br />
        <i>{{ $incident->root_cause }}</i>
        <br /><br />
        <b>Corrective Action:</b>
        <br /><br />
        <i>{{ $incident->corrective_action }}</i>
        <br /><br />
        <b>Findings:</b>
        <br /><br />
        <i>{{ $incident->findings }}</i>
        <br /><br />
    </p>



    <p>
        <b>Osh Remarks were:</b> <br /><br />
        <i>{{ $incident->review_of_root_cause }}</i>
        <br /><br />

    </p>

    <b>Kindly click the below link to close out this Incident.</b>
    <br /><br />
    <a href="{{ env('APP_URL') }}/auto_login/{{ $user->email }}/{{ $incident->id }}#findings">Close Out
        incident</a>
</div>
