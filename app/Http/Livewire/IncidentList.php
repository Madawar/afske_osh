<?php

namespace App\Http\Livewire;

use App\Models\Incident;
use Livewire\Component;
use App\Traits\SearchTrait;

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
            $query->where('finalized', $this->filter);
        }
        if ($this->search) {
            $query->search( $this->search,[]);
        }
        if ($this->pagination) {
            $incidents = $query->paginate($this->pagination);;
        } else {
            $incidents = $query->paginate(10);
        }

        return view('livewire.incident-list')->with(compact('incidents'));
    }
}
