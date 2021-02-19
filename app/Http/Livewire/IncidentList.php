<?php

namespace App\Http\Livewire;

use App\Models\Incident;
use Livewire\Component;
use App\Traits\SearchTrait;
use Illuminate\Support\Facades\Auth;

class IncidentList extends Component
{
    use SearchTrait;
    public $filter = null;
    public $search = null;
    public $pagination = null;

    protected $rules = [
        'filter' => '',
        'search' => '',
        'pagination' => '',
    ];
    public function render()
    {
        $query = Incident::query();
        $query = $query->with('department.owner');
        if ($this->filter) {
            if ($this->filter == "unassigned") {
                $query->whereNull('assigned_to_email');
            } elseif ($this->filter == "unresponsive") {
                $query->whereNull('root_cause')->whereNotNull('assigned_to_email');
            } elseif ($this->filter == "review") {
                $query->whereNotNull('root_cause')->where('finalized', 0);
            } elseif ($this->filter == "toMe") {
                $query->where('assigned_to_email', Auth::user()->email)->whereNotNull('root_cause')->where('finalized', 0);
            } else {
                $query->where('finalized', $this->filter);
            }
        }
        if ($this->search) {
            $query->search($this->search, []);
        }
        if ($this->pagination) {
            $incidents = $query->paginate($this->pagination);;
        } else {
            $incidents = $query->paginate(10);
        }

        return view('livewire.incident-list')->with(compact('incidents'));
    }
}
