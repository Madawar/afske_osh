<?php

namespace App\Http\Livewire\Incident\Response;

use App\Models\Incident;
use App\Models\IncidentFindings;
use Livewire\Component;

class IncidentCorrective extends Component
{
    public $incident;
    public $filter;
    public function mount($incident)
    {
        $this->incident = $incident;
        $this->incident = Incident::find($this->incident);
    }
    protected $listeners = ['findingChanged' => 'render'];
    public function render()
    {
        $query = IncidentFindings::query();

        if($this->filter == 'rejected'){
            $query->where('rejected', 1);
        }elseif($this->filter == 'accepted'){
            $query->whereNotNull('completion_date');
        }else{
            $query->where('incident_id', $this->incident->id)->where('rejected', 0)->whereNull('completion_date');
        }
        $findings = $query->get();
        return view('livewire.incident.response.incident-corrective')->extends('layouts.app')->with(compact('findings'));
    }
    public function filter($filter)
    {
        $this->filter = $filter;
    }

    public function advance()
    {
        return redirect()->route('preventive', ['incident' => $this->incident->id]);
    }
}
