<?php

namespace App\Http\Controllers;

use App\Exports\AuditTemplateExport;
use App\Models\AuditItem;
use App\Mail\AuditFindingsAssigned;
use App\Mail\AuditFindingsClosed;
use App\Mail\AuditFindingsReviewFailed;
use App\Models\Audit;
use App\Models\User;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Mail;

use function PHPUnit\Framework\isNull;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('audit.view_audit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $audit_id = null;
        return view('audit.create_audit')->with(compact('audit_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $audit = Audit::with(['AuditItems' => function ($query) {
        }])->where('id', $id)->first();
        if ($request->print == 1) {
            return Excel::download(new AuditTemplateExport($audit->id), 'invoices.xlsx');
        }
        return view('audit.edit_audit')->with(compact('audit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function review($id)
    {
        $audit = Audit::with(['AuditItems' => function ($query) {
            return $query->where('non_conformity', 1);
        }])->where('id', $id)->first();
        //return Excel::download(new AuditTemplateExport($audit->id), 'invoices.xlsx');
        return view('audit.review_audit')->with(compact('audit'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reviewBox($id)
    {
        $audit = AuditItem::where('id', $id)->first();
        //return Excel::download(new AuditTemplateExport($audit->id), 'invoices.xlsx');
        return view('audit.reviewBox')->with(compact('audit'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assign($id)
    {
        $audit = Audit::with(['AuditItems' => function ($query) {
            return $query->where('non_conformity', 1);
        }])->where('id', $id)->first();

        //Assign Capa Number
        foreach ($audit->AuditItems as $key => $item) {
           // dd($item->capa_number);
            if (isNull($item->capa_number)) {
                $item->capa_number = $audit->audit_no . '/C/' . $key;
                $item->save();
            }
        }
        $user = User::find($audit->auditee);
        Mail::to($user->email)->send(new AuditFindingsAssigned($audit, $user));
        return back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function close($id)
    {
        $audit = Audit::with(['AuditItems' => function ($query) {
            return $query->where('non_conformity', 1);
        }])->where('id', $id)->first();
        $user = User::find($audit->auditee);
        Mail::to('osh@afske.aero')->send(new AuditFindingsClosed($audit, $user));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function oshreview($id)
    {
        $audit = Audit::whereHas('AuditItems', function ($query) {
            return $query->where('non_conformity', 1,)->where('closed', 0);
        })->where('id', $id)->first();
        if ($audit) {
            $user = User::find($audit->auditee);
            Mail::to($user->email)->send(new AuditFindingsReviewFailed($audit, $user));
        } else {
        }

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
