<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;
use App\Models\Department;
use App\Models\Incident;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public $colors = array('#cc0022', '#006dd9', '#3ee315', '#eded07', '#ef0e91', '#8a03a0', '#0bf6ed', '#ff8200', '#234A2F', '#F76045', '#08D137');
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = Carbon::now()->format('ymd') . Str::random(3);
        $plot =  $this->getWeeklyRaise($file);
        $this->mostIncidents($file);
        $this->getHourlyIncidents($file);
        $this->getMonthlyRaise($file);
        $this->incidentByRisk($file);
        $this->incidentByCategory($file);
        $this->openIncidents($file);
    }

    public function getWeeklyRaise($file)
    {
        $incident_types = Incident::where('date', '>=', Carbon::today()->startOfYear())->get()->groupBy(function ($val) {
            return intval(Carbon::parse($val->date)->format('W'));
        });
        $incident_types =  $incident_types->sortBy(function ($item, $key) {
            return $key;
        });


        $data = [];
        $labels = [];
        foreach ($incident_types as $incident) {
            $data[] = $incident->count();
        }
        foreach ($incident_types as $key => $incident) {
            $labels[] = " Week" . $key . " ";
        }
        $graph = new Graph\Graph(1050, 450);
        $graph->img->SetQuality(100);
        $graph->SetScale('textlin');
        $graph->title->Set("Incidents Reported Per Week");
        $graph->xaxis->SetTickLabels($labels);
        $p1   = new Plot\BarPlot($data);
        //  $p1->ShowBorder();
        $p1->SetColor('black');
        $key = array_rand($this->colors);
        $p1->SetFillColor($this->colors[$key]);
        $graph->Add($p1);
        //$graph->img->SetImgFormat('jpeg');
        return $graph->Stroke(storage_path('app/public/charts/weekly_progress' . $file . '.png'));
    }
    public function getAverageClosureTime($file)
    {
        $incident_types = Incident::where('date', '>=', Carbon::today()->startOfYear())->get()->groupBy(function ($val) {
            return intval(Carbon::parse($val->date)->format('W'));
        });
        $incident_types =  $incident_types->sortBy(function ($item, $key) {
            return $key;
        });


        $data = [];
        $labels = [];
        foreach ($incident_types as $incident) {
            $data[] = $incident->count();
        }
        foreach ($incident_types as $key => $incident) {
            $labels[] = " Week" . $key . " ";
        }
        $graph = new Graph\Graph(1050, 450);
        $graph->img->SetQuality(100);
        $graph->SetScale('textlin');
        $graph->title->Set("Incidents Reported Per Week");
        $graph->xaxis->SetTickLabels($labels);
        $p1   = new Plot\BarPlot($data);
        //  $p1->ShowBorder();
        $p1->SetColor('black');
        $key = array_rand($this->colors);
        $p1->SetFillColor($this->colors[$key]);
        $graph->Add($p1);
        //$graph->img->SetImgFormat('jpeg');
        return $graph->Stroke(storage_path('app/public/charts/weekly_progress' . $file . '.png'));
    }
    public function getMonthlyRaise($file)
    {
        $incident_types = Incident::where('date', '>=', Carbon::today()->startOfYear())->get()->groupBy(function ($val) {
            return intval(Carbon::parse($val->date)->format('m'));
        });
        $incident_types =  $incident_types->sortBy(function ($item, $key) {
            return $key;
        });


        $data = [];
        $labels = [];
        foreach ($incident_types as $incident) {
            $data[] = $incident->count();
        }
        $months = ['', 'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', "NOV", "DEC"];
        foreach ($incident_types as $key => $incident) {
            $labels[] = $months[$key];
        }
        $graph = new Graph\Graph(1050, 450);
        $graph->img->SetQuality(100);
        $graph->SetScale('textlin');
        $graph->title->Set("Incidents Reported Per Month");
        $graph->xaxis->SetTickLabels($labels);
        $p1   = new Plot\BarPlot($data);
        //  $p1->ShowBorder();
        $p1->SetColor('black');
        shuffle($this->colors);
        $key = array_rand($this->colors);
        $p1->SetFillColor($this->colors[$key]);
        $graph->Add($p1);
        //$graph->img->SetImgFormat('jpeg');
        $graph->Stroke(storage_path('app/public/charts/monthly_progress' . $file . '.png'));
    }
    public function getHourlyIncidents($file)
    {
        $incident_types = Incident::where('date', '>=', Carbon::today()->startOfYear())->get()->groupBy(function ($val) {
            return intval(Carbon::parse($val->time)->format('H'));
        });
        $incident_types =  $incident_types->sortBy(function ($item, $key) {
            return $key;
        });


        $data = [];
        $labels = [];
        foreach ($incident_types as $incident) {
            $data[] = $incident->count();
        }

        foreach ($incident_types as $key => $incident) {
            $labels[] = $key;
        }
        $graph = new Graph\Graph(1050, 450);
        $graph->img->SetQuality(100);
        $graph->SetScale('textlin');
        $graph->title->Set("Incidents Reported on an Hourly Basis (24 Hours Format)");
        $graph->xaxis->SetTickLabels($labels);
        $p1   = new Plot\BarPlot($data);
        //  $p1->ShowBorder();
        $p1->SetColor('black');
        shuffle($this->colors);
        $key = array_rand($this->colors);
        $p1->SetFillColor($this->colors[$key]);
        $graph->Add($p1);
        //$graph->img->SetImgFormat('jpeg');
        $graph->Stroke(storage_path('app/public/charts/Hourly_Incidents' . $file . '.png'));
    }
    public function incidentByCategory($file)
    {
        $incident_types = Incident::all();
        $incident_types = $incident_types->groupBy('incident_type');
        $data = [];
        $labels = [];
        foreach ($incident_types as $incident) {
            $data[] = $incident->count();
        }
        foreach ($incident_types as $key => $incident) {
            $labels[] = $key . " %.1f%%";
        }
        $graph = new Graph\PieGraph(650, 650);
        $graph->img->SetQuality(100);
        $graph->SetScale('textlin');
        $graph->title->Set("Incident Types across all departments");
        $p1   = new Plot\PiePlot($data);
        $p1->SetLabelType(PIE_VALUE_PER);
        $p1->SetLabels($labels);
        // $p1->SetLegends($labels);
        //  $p1->ShowBorder();
        $p1->SetColor('black');
        shuffle($this->colors);
        $p1->SetSliceColors($this->colors);
        $graph->Add($p1);
        // $graph->img->SetImgFormat('jpeg');
        $graph->Stroke(storage_path('app/public/charts/incidents_by_category' . $file . '.png'));
    }
    public function incidentByRisk($file)
    {
        $incident_types = Incident::whereNotNull('risk_level')->get();
        $incident_types = $incident_types->groupBy('risk_level');
        $data = [];
        $labels = [];
        foreach ($incident_types as $incident) {
            $data[] = $incident->count();
        }
        foreach ($incident_types as $key => $incident) {
            $labels[] = $key . " %.1f%%";
        }
        $graph = new Graph\PieGraph(650, 650);
        $graph->img->SetQuality(100);
        $graph->SetScale('textlin');
        $graph->title->Set("Incident Risk accross all departments");
        $p1   = new Plot\PiePlot($data);
        $p1->SetLabelType(PIE_VALUE_PER);
        $p1->SetLabels($labels);
        //  $p1->ShowBorder();
        $p1->SetColor('black');
        shuffle($this->colors);
        $p1->SetSliceColors($this->colors);
        $graph->Add($p1);
        $graph->img->SetImgFormat('png');
        $graph->Stroke(storage_path('app/public/charts/risk_profile' . $file . '.png'));
    }
    public function openIncidents($file)
    {
        $open_incidents = Department::with(['incidents' => function ($query) {
            $query->where('finalized', 0);
        }])->get();
        $data = [];
        $labels = [];
        foreach ($open_incidents as $incident) {
            $data[] = $incident->incidents->count();
        }
        foreach ($open_incidents as $incident) {
            $labels[] = $incident->name;
        }
        $graph = new Graph\Graph(650, 450);
        $graph->img->SetQuality(100);
        $graph->SetScale('textlin');
        $graph->title->Set("Incidents Open Per Department");
        $graph->xaxis->SetTickLabels($labels);
        $p1   = new Plot\BarPlot($data);
        //  $p1->ShowBorder();
        $p1->SetColor('black');
        shuffle($this->colors);
        $p1->SetFillColor($this->colors);
        $graph->Add($p1);
        //$graph->img->SetImgFormat('jpeg');
        $graph->Stroke(storage_path('app/public/charts/open_incidents' . $file . '.png'));
    }
    public function mostIncidents($file)
    {
        $incidents = Incident::all();
        $incidents = $incidents->groupBy('reporter_email');
        $data = [];
        $labels = [];

        $incidents = $incidents->map(function ($item, $key) {
            return collect($item)->count();
        });

        foreach ($incidents->sortDesc()->take(3) as $key=>$incident) {
            $data[] = $incident;
        }
        foreach ($incidents->sortDesc()->take(3) as $key => $incident) {
            $labels[] = $key;
        }
        $graph = new Graph\Graph(650, 450);
        $graph->img->SetQuality(100);
        $graph->SetScale('textlin');
        $graph->title->Set("Top 3 Staff in Reporting");
        $graph->xaxis->SetTickLabels($labels);
        $p1   = new Plot\BarPlot($data);
        //  $p1->ShowBorder();
        $p1->SetColor('black');
        shuffle($this->colors);
        $p1->SetFillColor($this->colors);
        $graph->Add($p1);
        //$graph->img->SetImgFormat('jpeg');
        $graph->Stroke(storage_path('app/public/charts/reporter_incidents' . $file . '.png'));
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
    public function edit($id)
    {
        //
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
