<?php

namespace App\Http\Livewire;

use App\Mail\IncidentClosed;
use App\Mail\IncidentReviewFailed;
use App\Mail\ManagerAssigned;
use App\Models\Department;
use App\Models\User;
use App\Models\Incident;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class IncidentForm extends Component
{

    public $date;
    public $reporter;
    public $pno;
    public $department_id;
    public $reporter_email;

    //Incident Details
    public $time;
    public $location;
    public $incident_type;
    public $flight;
    public $operational_impact;
    public $narration;
    public $immediate_corrective_action;
    public $damage;
    public $registration;
    public $model;
    public $staff_name;
    public $staff_pno;
    public $staff_injury;
    public $incident_id = null;
    public $vehicles = array();
    public $staff = array();

    //Assign
    public $assigned_to_email;
    public $assigned_to_name;

    //Manager
    public $root_cause;
    public $findings;
    public $corrective_action;

    //Review
    public $lti;
    public $cost;
    public $risk_level;
    public $review_of_root_cause;
    public $finalized;

    protected $rules = [
        'date' => 'required|date',
        'reporter' => 'required|min:3',
        'pno' => 'required|min:2',
        'department_id' => 'required',
        'reporter_email' => 'required|email',
        'time' => 'required',
        'location' => 'required',
        'incident_type' => 'required',
        'flight' => '',
        'operational_impact' => '',
        'narration' => 'required',
        'immediate_corrective_action' => 'required',
        'vehicles' => '',
        'staff' => '',
        'assigned_to_email' => 'required|email',
        'assigned_to_name' => 'required|min:2',
        'root_cause' => '',
        'findings' => '',
        'corrective_action' => '',
        'lti' => '',
        'cost' => '',
        'risk_level' => '',
        'review_of_root_cause' => '',
        'finalized' => ''

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount($incident_id)
    {
        if ($incident_id) {
            $this->loadDefaults($incident_id);
        }
    }

    public function render($id = null)
    {

        $departments = Department::all();
        return view('livewire.incident-form')->with(compact('departments'));
    }

    public function loadDefaults($id)
    {
        $incident = Incident::find($id);
        $this->date = $incident->date;
        $this->reporter = $incident->reporter;
        $this->pno = $incident->pno;
        $this->department_id = $incident->department_id;
        $this->reporter_email = $incident->reporter_email;
        $this->time = $incident->time;
        $this->location = $incident->location;
        $this->incident_type = $incident->incident_type;
        $this->flight = $incident->flight;
        $this->operational_impact = $incident->operational_impact;
        $this->narration = $incident->narration;
        $this->immediate_corrective_action = $incident->immediate_corrective_action;
        $this->assigned_to_email = $incident->assigned_to_email;
        $this->assigned_to_name = $incident->assigned_to_name;
        $this->root_cause = $incident->root_cause;
        $this->findings = $incident->findings;
        $this->corrective_action = $incident->corrective_action;
        $this->lti = $incident->lti;
        $this->cost = $incident->cost;
        $this->risk_level = $incident->risk_level;
        $this->review_of_root_cause = $incident->review_of_root_cause;
        $this->finalized = $incident->finalized;
        $this->vehicles = json_decode($incident->vehicles);
        if ($this->vehicles != null) {
            foreach ($this->vehicles as $key => $value) {
                $this->vehicles[$key] = (array)$value;
            }
        }
        $this->staff = json_decode($incident->staff);
        if ($this->staff != null) {
            foreach ($this->staff as $key => $value) {
                $this->staff[$key] = (array)$value;
            }
        }
    }

    public function saveReport()
    {
        $this->validate([
            'date' => 'required|date',
            'reporter' => 'required|min:3',
            'pno' => 'required|min:2',
            'department_id' => 'required',
            'reporter_email' => 'required|email',
            'time' => 'required',
            'location' => 'required',
            'incident_type' => 'required',
            'flight' => '',
            'operational_impact' => '',
            'narration' => 'required',
            'immediate_corrective_action' => 'required',
            'vehicles' => '',
            'staff' => '',
        ]);
        $incident =  Incident::create(array(
            'date' => $this->date,
            'reporter' => $this->reporter,
            'pno' => $this->pno,
            'department_id' => $this->department_id,
            'reporter_email' => $this->reporter_email,
            'time' => $this->time,
            'location' => $this->location,
            'incident_type' => $this->incident_type,
            'flight' => $this->flight,
            'operational_impact' => $this->operational_impact,
            'narration' => $this->narration,
            'immediate_corrective_action' => $this->immediate_corrective_action,
            'vehicles' => json_encode($this->vehicles),
            'staff' => json_encode($this->staff),
        ));
        $this->incident_id = $incident->id;
        $this->message('This Incident has been successfully recorded and an OSH staff will  assign it to a manager to resolve.');
    }

    public function updateReport()
    {
        $this->validate([
            'date' => 'required|date',
            'reporter' => 'required|min:3',
            'pno' => 'required|min:2',
            'department_id' => 'required',
            'reporter_email' => 'required|email',
            'time' => 'required',
            'location' => 'required',
            'incident_type' => 'required',
            'flight' => '',
            'operational_impact' => '',
            'narration' => 'required',
            'immediate_corrective_action' => 'required',
            'vehicles' => '',
            'staff' => '',
        ]);
        $incident =  Incident::find($this->incident_id);
        $incident->update(array(
            'date' => $this->date,
            'reporter' => $this->reporter,
            'pno' => $this->pno,
            'department_id' => $this->department_id,
            'reporter_email' => $this->reporter_email,
            'time' => $this->time,
            'location' => $this->location,
            'incident_type' => $this->incident_type,
            'flight' => $this->flight,
            'operational_impact' => $this->operational_impact,
            'narration' => $this->narration,
            'immediate_corrective_action' => $this->immediate_corrective_action,
            'vehicles' => json_encode($this->vehicles),
            'staff' => json_encode($this->staff),
        ));
        $this->incident_id = $incident->id;
        $this->message('This Incident has been successfully updated and an OSH staff will assign it to a manager to resolve.');
    }

    public function assignToManager($id)
    {
        $this->validate([
            'assigned_to_email' => 'required|email',
            'assigned_to_name' => 'required|min:2',
        ]);
        $incident = Incident::find($id);
        $incident->update(array(
            'assigned_to_email' => $this->assigned_to_email,
            'assigned_to_name' => $this->assigned_to_name
        ));
        $password = Str::random(4);
        $user =  User::where('email', $this->assigned_to_email)->first();
        if ($user) {
        } else {
            $user =  User::create(array(
                'name' => $this->assigned_to_name,
                'email' => $this->assigned_to_email,
                'password' => Hash::make(Str::random(4)),
                'account_type' => 'manager'
            ));
        }
        Mail::to($this->assigned_to_email)->send(new ManagerAssigned($incident, $user));
        $this->message('This Incident has been assigned to ' . $this->assigned_to_name . ' and email sent to him');
    }

    public function closeIncident($id)
    {
        $this->validate([
            'root_cause' => '',
            'findings' => '',
            'corrective_action' => '',
        ]);
        $incident = Incident::find($id);
        $incident->update(array(
            'findings' => $this->findings,
            'corrective_action' => $this->corrective_action,
            'root_cause' => $this->root_cause,
        ));

        Mail::to(env('OSH_EMAIL'))
            ->cc(Auth::user()->email)
            ->send(new IncidentClosed($incident, Auth::user()));
        $this->message('This Incident closure has been sent to OSH department.');
    }
    public function oshReview($id)
    {
        $this->validate([
            'lti' => '',
            'cost' => '',
            'risk_level' => '',
            'review_of_root_cause' => 'required|min:10',
            'finalized' => 'required'
        ]);
        $incident = Incident::find($id);
        $incident->update(array(
            'lti' => $this->lti,
            'cost' => $this->cost,
            'risk_level' => $this->risk_level,
            'review_of_root_cause' => $this->review_of_root_cause,
            'finalized' => $this->finalized
        ));
        if ($this->finalized) {
            $this->message('Incident Closed.');
        } else {
            $user =  User::where('email', $incident->assigned_to_email)->first();
            Mail::to($this->assigned_to_email)->send(new IncidentReviewFailed($incident, $user));
            $this->message('A response has been sent to the Manager.');
        }
    }

    public function addVehicle()
    {
        array_push($this->vehicles, array(
            'model' => $this->model,
            'registration' => $this->registration,
            'damage' => $this->damage,
        ));
        $this->model = '';
        $this->registration = '';
        $this->damage = '';
    }
    public function addStaff()
    {
        array_push($this->staff, array(
            'staff_name' => $this->staff_name,
            'staff_pno' => $this->staff_pno,
            'staff_injury' => $this->staff_injury,
        ));
        $this->staff_name = '';
        $this->staff_pno = '';
        $this->staff_injury = '';
    }

    public function removeVehicle($index)
    {
        unset($this->vehicles[$index]);
    }
    public function removeStaff($index)
    {
        unset($this->staff[$index]);
    }

    public function message($message)
    {
        session()->flash('message', $message);
        $this->emit('message', $message);
    }
}