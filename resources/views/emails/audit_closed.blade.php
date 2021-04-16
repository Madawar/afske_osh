<div>
    <p>
        Audit : <b>{{ $audit->audit_no }}</b>, has a response.
    </p>




    Kindly click the below link to review this Audit findings
    <br /><br />
    <a href="{{ route('audit.review', $audit->id) }}">Review Audit</a>
    <br /><br />
    <b>Copy the link below to your browser if you have any issue with clicking the above</b><br />
    {{ route('audit.review', $audit->id) }}

</div>
