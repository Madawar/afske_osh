<?php

namespace App\Http\Livewire;

use App\Models\Incident;
use Livewire\Component;
use App\Traits\SearchTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Excel;
use App\Exports\IncidentExport;
class IncidentList extends Component
{
    use WithPagination;
    use SearchTrait;
    public $filter = null;
    public $search = null;
    public $pagination = null;
    public $sortBy = null;

    protected $rules = [
        'filter' => '',
        'search' => '',
        'pagination' => '',
        'sortBy' => '',
    ];
    public function render()
    {
        $query = Incident::query();
        $query = $query->with('department');
        $query = $this->query($query);
        if ($this->pagination) {
            $incidents = $query->paginate($this->pagination);;
        } else {
            $incidents = $query->paginate(10);
        }


        $options = array(
            null => 'ALL',
            1 => 'Closed Incidents',
            'unassigned' => 'Not Assigned For Closure',
            'review' => 'For OSH Review',
            'unresponsive' => 'Unresponsive Incidents',
            'deleted' => 'Deleted Incidents',
            'toMe' => 'Assigned To Me',
        );

        return view('livewire.incident-list')->with(compact('incidents', 'options'));
    }
    public function deleteIncident($id)
    {
        Incident::destroy($id);
    }

    public function query($query)
    {
        if ($this->filter) {
            if ($this->filter == "unassigned") {
                $query->whereNull('assigned_to_email');
            } elseif ($this->filter == "unresponsive") {
                $query->whereNull('root_cause')->whereNotNull('assigned_to_email');
            } elseif ($this->filter == "review") {
                $query->whereNotNull('root_cause')->where('finalized', 0);
            } elseif ($this->filter == "deleted") {
                $query->onlyTrashed();
            } elseif ($this->filter == "toMe") {
                $query->where('assigned_to_email', Auth::user()->email)->whereNotNull('root_cause')->where('finalized', 0);
            } else {
                $query->where('finalized', $this->filter);
            }
        }
        if ($this->sortBy) {
            $query->orderBy($this->sortBy);
        } else {
            $query->orderBy('created_at', 'DESC');
        }
        if ($this->search) {
            $query->search($this->search, []);
        }
        if (Auth::user()->account_type == 'osh') {
        } else {
            $query =   $query->orWhere('reporter_email', Auth::user()->email)->orWhere('assigned_to_email', Auth::user()->email);
        }
        return $query;
    }

    public function download(){
        $query = Incident::query();
        $query = $query->with('department.owner');
        $records = $this->query($query)->get();
        $file = Str::random(4).'.xlsx';
        $file = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $file);
        // Remove any runs of periods (thanks falstro!)
        $file = mb_ereg_replace("([\.]{2,})", '', $file);
        return Excel::download(new IncidentExport($records), $file);;
    }

    public function sortBy($name)
    {
        $this->sortBy = $name;
    }
}
