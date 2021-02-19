<div>
    <p>
        You have been Assigned Incident : <b>{{ $incident->incident_no }}</b>,
        that was reported by <b>{{ $incident->reporter }}</b> at <b>{{ $incident->created_at }}</b>.
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

    Kindly click the below link to close out this Incident
    <br /><br />
    <a href="{{env('APP_URL')}}/auto_login/{{$user->email}}/{{$incident->id}}#findings">Close Out incident</a>
</div>
