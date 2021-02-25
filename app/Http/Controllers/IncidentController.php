<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;
use Jenssegers\Agent\Agent;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $agent = new Agent();
        if ($agent->browser() != "Firefox" or $agent->browser() != "Chrome") {
            return "Please use Chrome or Firefox";
        }
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
        $incident =  Incident::find($id);
        //Vehicles Detauls
        $vehicles = json_decode($incident->vehicles);
        if ($vehicles != null) {
            $string = '';
            foreach ($vehicles as $vehicle) {
                $string = $string . ' ' . $vehicle->model . ' Registration Number ' . $vehicle->registration . ' ,' . $vehicle->damage . '<w:br/>';
            }
            $incident->vehicles = $string;
        }
        //Injuries
        $staff = json_decode($incident->staff);
        if ($staff != null) {
            $string = '';
            foreach ($staff as $employee) {
                $string = $string . ' ' . $employee->staff_name . ' ( Payroll Number : ' . $employee->staff_pno . '),' . $employee->staff_injury . '<w:br/>';
            }
            $incident->staff = $string;
        }



        $replacements = array(
            $incident->toArray()
        );
        $templateProcessor->cloneBlock('block_name', 0, true, false, $replacements);
        $path = 'public/' . Str::random(5) . '.docx';
        $templateProcessor->saveAs(Storage::path($path));
        return $path;
    }
}
