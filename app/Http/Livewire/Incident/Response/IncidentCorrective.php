<?php

namespace App\Http\Livewire\Incident\Response;

use App\Models\Incident;
use App\Models\IncidentFindings;
use Livewire\Component;

class IncidentCorrective extends Component
{
    public $incident;
    public function mount($incident)
    {
        $this->incident = $incident;
        $this->incident = Incident::find($this->incident);
    }

    public function render()
    {
        $findings = IncidentFindings::where('incident_id',$this->incident->id)->get();
        return view('livewire.incident.response.incident-corrective')->extends('layouts.app')->with(compact('findings'));
    }
}
