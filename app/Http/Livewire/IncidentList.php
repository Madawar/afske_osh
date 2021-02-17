<?php

namespace App\Http\Livewire;

use App\Models\Incident;
use Livewire\Component;

class IncidentList extends Component
{
    public function render()
    {
        $incidents = Incident::with('department.owner')->paginate(10);
        return view('livewire.incident-list')->with(compact('incidents'));
    }
}
