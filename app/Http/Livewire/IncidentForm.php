<?php

namespace App\Http\Livewire;

use App\Mail\IncidentClosed;
use App\Mail\IncidentReviewFailed;
use App\Mail\ManagerAssigned;
use App\Mail\NewIncident;
use App\Models\Department;
use App\Models\User;
use App\Models\Incident;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Arr;

class IncidentForm extends Component
{

    use WithFileUploads;

    public $incident = null;
    public $staff_name = null;
    public $staff_pno = null;
    public $staff_injury = null;
    public $model = null;
    public $registration = null;
    public $modalShow = false;
    public $edit = true;
    public $damage = null;
    public $message = null;
    public $photos = [];

    protected $rules = [
        'incident.date' => 'required|date',
        'incident.reporter' => 'required|min:3',
        'incident.report_type' => 'required',
        'incident.telephone' => 'required',
        'incident.pno' => 'required|min:2',
        'incident.department_id' => 'required',
        'incident.reporter_email' => 'email',
        'incident.time' => 'required',
        'incident.location' => 'required',
        'incident.incident_type' => 'required',
        'incident.flight' => '',
        'incident.operational_impact' => '',
        'incident.narration' => 'required',
        'incident.immediate_corrective_action' => 'required',
        'incident.vehicles' => '',
        'incident.staff' => '',
        'incident.assigned_to_email' => 'required|email',
        'incident.assigned_to_name' => 'required|min:2',
        'incident.root_cause' => '',
        'incident.findings' => '',
        'incident.corrective_action' => '',
        'incident.lti' => '',
        'incident.cost' => '',
        'incident.risk_level' => '',
        'incident.review_of_root_cause' => '',
        'incident.finalized' => '',
        'incident.evidence' => '',
        'incident.finding_level' => '',

        'incident.photos' => '',
        'photos' => '',

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount($incident_id)
    {
        $this->message = [];
        $this->message['title'] = '';
        $this->message['subtext'] = '';
        $this->message['information'] = '';
        if ($incident_id) {
            $this->edit = false;
            $this->loadDefaults($incident_id);
        } else {

            $this->incident = new Incident();
            $this->incident->finalized = 0;
        }
    }

    public function closeModal()
    {
        $this->modalShow = false;
    }

    public function showModal($title, $subText, $information)
    {
        $this->message['title'] = $title;
        $this->message['subtext'] = $subText;
        $this->message['information'] = $information;
        // dd('here');
        $this->modalShow = true;
    }
    public function render($id = null)
    {
        $departments = Department::all()->pluck('name', 'id');
        $incident_types = array(
            'MV Damage' => 'MV Damage',
            'Aircraft Damage' => 'Aircraft Damage',
            'Employee Injury' => 'Employee Injury',
            'Fire Incident' => 'Fire Incident',
            'Vehicle incident' => 'Vehicle incident',
            'Property Damage' => 'Property Damage',
            'Cargo Damage' => 'Cargo Damage',
            'Equipment Damage' => 'Equipment Damage',
            'Environmental Spillage' => 'Environmental Spillage (Fuel,Oil,Toilet Waste,Hydraulic Waste)',
            'Near Miss' => 'Near Miss',
            'Hazard' => 'Hazard',
        );
        $risk_levels = array(
            '1A' => '1A',
            '1B' => '1B',
            '1C' => '1C',
            '1D' => '1D',
            '1E' => '1E',
            '2A' => '2A',
            '2B' => '2B',
            '2C' => '2C',
            '2D' => '2D',
            '2E' => '2E',
            '3A' => '3A',
            '3B' => '3B',
            '3C' => '3C',
            '3D' => '3D',
            '3E' => '3E',
            '4A' => '4A',
            '4B' => '4B',
            '4C' => '4C',
            '4D' => '4D',
            '4E' => '4E',
            '5A' => '5A',
            '5B' => '5B',
            '5C' => '5C',
            '5D' => '5D',
            '5E' => '5E',
        );
        $finding_levels = array(
            'L1' => 'L1 (Close Within 7 Days)',
            'L2' => 'L2 (Close Within 30 Days)',
            'L3' => 'L3 (Close Within 90 Days)',
        );
        return view('livewire.incident-form')->with(compact('departments', 'incident_types', 'risk_levels', 'finding_levels'));
    }

    public function loadDefaults($id)
    {
        $incident = Incident::find($id);
        $this->incident = $incident;



        // $this->incident->evidence = $this->incident->evidence;
    }

    public function saveReport()
    {
        $this->validate([
            'incident.date' => 'required|date',
            'incident.reporter' => 'required|min:3',
            'incident.report_type' => 'required',
            'incident.pno' => 'required|min:2',
            'incident.department_id' => 'required',
            'incident.reporter_email' => 'email',
            'incident.time' => 'required',
            'incident.location' => 'required',
            'incident.incident_type' => 'required',
            'incident.flight' => '',
            'incident.evidence' => '',
            'incident.operational_impact' => '',
            'incident.narration' => 'required|min:10',
            'incident.immediate_corrective_action' => 'required|min:10',
            'incident.telephone' => 'required|min:8'

        ]);
        $this->incident->finalized = 0;
        $incident =  Incident::create($this->incident->toArray());
        Mail::to($this->incident->reporter_email)->cc('osh@afske.aero')->send(new NewIncident($incident));
        $this->edit = false;
        $this->showModal('Incident Raised', 'Incident was raised Successfully', 'Your Incident was raised successfully');
    }

    public function updateReport()
    {

        $this->validate([
            'incident.date' => 'required|date',
            'incident.reporter' => 'required|min:3',
            'incident.report_type' => 'required',
            'incident.pno' => 'required|min:2',
            'incident.department_id' => 'required',
            'incident.reporter_email' => 'email',
            'incident.time' => 'required',
            'incident.location' => 'required',
            'incident.incident_type' => 'required',
            'incident.flight' => '',
            'incident.evidence' => '',
            'incident.operational_impact' => '',
            'incident.narration' => 'required|min:10',
            'incident.immediate_corrective_action' => 'required|min:10',
            'incident.telephone' => 'required|min:8'

        ]);
        // dd($this->incident);
        $incident = Arr::except($this->incident->toArray(), ['department', 'finding']);
        $this->incident->update($incident);
        $this->edit = false;
        $this->showModal('Incident Updated', 'Incident was updated Successfully', 'Your Incident has been successfully updated and an OSH staff will assign it to a manager to resolve');
    }

    public function assignToManager($id)
    {
        $this->validate([
            'incident.assigned_to_email' => 'required|email',
            'incident.assigned_to_name' => 'required|min:2',
            'incident.finding_level' => 'required',
        ]);
        $this->incident->save();
        $password = Str::random(4);
        $user =  User::where('email', $this->incident->assigned_to_email)->first();
        if ($user) {
        } else {
            $user =  User::create(array(
                'name' => $this->incident->assigned_to_name,
                'email' => $this->incident->assigned_to_email,
                'password' => Hash::make(Str::random(4)),
                'account_type' => 'manager'
            ));
        }
        Mail::to($this->incident->assigned_to_email)->cc('osh@afske.aero')->send(new ManagerAssigned($this->incident, $user));
        $this->showModal('Incident Assigned', 'Incident was assigned', 'This Incident has been assigned to ' . $this->incident->assigned_to_name . ' and email sent to him');
    }

    public function closeIncident($id)
    {
        $this->validate([
            'root_cause' => 'required|min:30',
            'findings' => 'required|min:30',
            'corrective_action' => 'required|min:30',
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

    public function editIncident()
    {
        $this->edit =  !$this->edit;
    }
    public function oshReview($id)
    {
        $this->validate([
            'incident.lti' => '',
            'incident.cost' => '',
            'incident.risk_level' => '',
            'incident.review_of_root_cause' => 'required|min:10',
            'incident.finalized' => 'required'
        ]);
        $this->incident->save();
        if ($this->incident->finalized) {
            $this->showModal('Incident Closed', 'Incident was Closed Successfully', 'This Incident has been closed');
        } else {
            $user =  User::where('email', $this->incident->assigned_to_email)->first();
            Mail::to($this->assigned_to_email)->send(new IncidentReviewFailed($this->incident, $user));
            $this->message('A response has been sent to the Manager.');
        }
    }
    public function savePhoto()
    {
        $this->validate([
            'photos.*' => 'max:2024', // 1MB Max
        ]);

        $files = $this->incident->photos;
        if (!is_array($files)) {
            $files = [];
        }
        foreach ($this->photos as $photo) {
            $uploadedFile =  $photo->store('public/photos');
            $extension = explode('/', $uploadedFile);
            $filename = end($extension);
            $files[] = $filename;
        }

        $this->incident->photos = $files;
        if ($this->incident->id != null) {
            $this->incident->save();
            $files = null;
            $this->photos = [];
        }
    }

    public function saveEvidence()
    {
        $this->validate([
            'evidenceFiles.*' => 'max:5024', // 1MB Max
        ]);

        foreach ($this->incident->evidence as $evidence) {
            $uploadedFile =  $evidence->store('public/evidence');
            $extension = explode('/', $uploadedFile);
            $filename = end($extension);
            $this->evidence[] = $filename;
        }

        $this->updateReport();
    }
    public function addVehicle()
    {
        $this->validate(
            array(
                'model' => 'min:3',
                'registration' => 'required|min:4',
                'damage' => 'required|min:4',
            )
        );

        $vehicles = $this->incident->vehicles ?? [];
        if (!is_array($vehicles)) {
            $vehicles = [];
        }

        array_push($vehicles, array(
            'model' => $this->model,
            'registration' => $this->registration,
            'damage' => $this->damage,
        ));
        $this->incident->vehicles = $vehicles;
        $this->model = '';
        $this->registration = '';
        $this->damage = '';
        if ($this->incident->id != null) {
            $this->incident->save();
        }
    }
    public function addStaff()
    {
        $this->validate(
            array(
                'staff_name' => 'min:3'
            )
        );

        $staff = $this->incident->staff ?? [];
        if (!is_array($staff)) {
            $staff = [];
        }
        array_push($staff, array(
            'staff_name' => $this->staff_name,
            'staff_pno' => $this->staff_pno,
            'staff_injury' => $this->staff_injury,
        ));
        $this->incident->staff = $staff;
        $this->staff_name = '';
        $this->staff_pno = '';
        $this->staff_injury = '';
        if ($this->incident->id != null) {
            $this->incident->save();
        }
    }

    public function removeVehicle($index)
    {
        unset($this->vehicles[$index]);
    }
    public function removeStaff($index)
    {
        unset($this->incident->staff[$index]);
    }

    public function message($message)
    {
        session()->flash('message', $message);
        $this->emit('message', $message);
    }
    public function reload()
    {
        return redirect()->to('/');
    }
}
