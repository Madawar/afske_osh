<?php

namespace App\Http\Controllers;

use App\Exports\AuditTemplateExport;
use App\Models\Audit;
use Illuminate\Http\Request;
use Excel;

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
    public function edit($id,Request $request)
    {
        $audit = Audit::with(['AuditItems' => function ($query) {
        }])->where('id', $id)->first();
        if($request->print == 1){
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