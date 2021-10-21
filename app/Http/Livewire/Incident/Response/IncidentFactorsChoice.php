<?php

namespace App\Http\Livewire\Incident\Response;

use App\Models\Incident;
use Livewire\Component;
use App\Models\IncidentFactor;
use App\Models\IncidentFindings;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class IncidentFactorsChoice extends Component
{
    public $factor = [];
    public $incident;

    public function mount($incident)
    {
        $this->incident = $incident;
        $this->incident = Incident::find($this->incident);
    }
    protected $rules = [
        'factor' => 'required|min:1',
    ];
    public function render()
    {
        $factors = IncidentFactor::all();
        $existing_findings = IncidentFindings::where('incident_id', $this->incident->id)->get();
        $existing_findings = $existing_findings->pluck('incident_factor_id')->toArray();
        $factor_group =  $factors->groupBy('category');
        return view('livewire.incident.response.incident-factors-choice')->extends('layouts.app')->with(compact('factor_group', 'existing_findings'));
    }

    public function advance()
    {
        if (Auth::user()->account_type != 'osh') {
            $count = IncidentFindings::where('incident_id', $this->incident->id)->count();
            if ($count == 0) {
                $this->validate();
            }
            $filtered = Arr::where($this->factor, function ($value, $key) {
                return $value = true;
            });
            $filtered = array_keys($filtered);
            foreach ($filtered as $entry) {
                $item =  IncidentFactor::find($entry);
                IncidentFindings::firstOrCreate(array(
                    'incident_factor_id' => $item->id,
                    'incident_id' => $this->incident->id,
                    'factor' => $item->factor
                ));
            }
            return redirect()->route('corrective', ['incident' => $this->incident->id]);
        } else {
            return redirect()->route('corrective', ['incident' => $this->incident->id]);
        }
    }
}
