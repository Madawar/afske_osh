<div>
    <p>
        We have not received any feedback for Incident  : <b>{{ $incident->incident_no }}</b>,
        that was reported by <b>{{ $incident->reporter }}</b>.
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
    <br /><br />
    <b>Copy the link below to your browser if you have any issue with clicking the above</b><br />
    {{env('APP_URL')}}/auto_login/{{$user->email}}/{{$incident->id}}#findings
</div>
