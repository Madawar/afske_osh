<div>
    <p>
        You have been Assigned Audit  : <b>{{ $audit->audit_no }}</b>:-
    </p>



    Kindly click the below link to close out this Audit findings
    <br /><br />
    <a href="{{env('APP_URL')}}/auto_login/{{$user->email}}/{{$audit->id}}?type=audit">Close Out incident</a>
    <br /><br />
    <b>Copy the link below to your browser if you have any issue with clicking the above</b><br />
    {{env('APP_URL')}}/auto_login/{{$user->email}}/{{$audit->id}}?type=audit
</div>
