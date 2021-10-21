<?php

namespace App\Http\Controllers;

use App\Exports\IncidentExport;
use App\Models\Incident;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;
use Jenssegers\Agent\Agent;
use Excel;
use Illuminate\Support\Arr;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->download == true) {
            $file = 'Incidents_as_at_' . Carbon::now()->format('j_M_y') . '.xlsx';
            return Excel::download(new IncidentExport(), $file);
        }

        return view('view_incidents');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id, Request $request)
    {
        if ($request->has('word')) {
            $path =  $this->toWord($id);
            return Storage::download($path);
        }

        return view('view_report')->with(compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('view_report')->with(compact('id'));
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

    public function toWord($id)
    {
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(Storage::path('Template.docx'));
        $incident =  Incident::with('department','finding')->find($id);
        //dd($incident->finding[0]->analysis);
        $incident->dep = '';
        if(isset($incident->department)){
            $incident->dep = $incident->department->name;
        }

        $incident->date = Carbon::parse($incident->date)->format('j-M-y');
        $incident->created_at = Carbon::parse($incident->created_at)->format('j-M-y');
        $r =  Arr::except($incident->toArray(), ['vehicles','finding', 'staff', 'evidence', 'photos','department']);
        $replacements = array(
            $r
        );
       $findings =  $incident->finding->toArray();
       foreach($findings as $key=>$finding){

            unset($findings[$key]['analysis']);

       }

        $templateProcessor->cloneBlock('block_name', 0, true, false, $replacements);
        $templateProcessor->cloneBlock('vehicles', 0, true, false, $incident->vehicles);
        $templateProcessor->cloneBlock('staff', 0, true, false, $incident->staff);
        $templateProcessor->cloneBlock('findings', 0, true, false,$findings);
        $templateProcessor->cloneBlock('findings_old', 0, true, false,$replacements);
        $templateProcessor->cloneBlock('assigned_to', 0, true, false,$replacements);
        $path = 'public/' . Str::random(5) . '.docx';
        $templateProcessor->saveAs(Storage::path($path));
        return $path;
    }
}
