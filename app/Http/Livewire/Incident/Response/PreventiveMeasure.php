<?php

namespace App\Http\Livewire\Incident\Response;

use App\Models\Incident;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;
use App\Mail\IncidentClosed;
use App\Mail\IncidentReviewFailed;
use App\Models\IncidentFindings;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class PreventiveMeasure extends Component
{
    public $incident;
    public $images;
    public $photos;
    public $modalShow;
    public $message = null;

    use WithFileUploads;

    protected $rules = [
        'incident.evidence' => '',
        'incident.preventive_measure' => '',
        'incident.review_of_root_cause'=> '',

    ];
    public function mount($incident)
    {
        $this->incident = $incident;
        $this->incident = Incident::find($this->incident);
        $this->images = $this->incident->evidence ?? [];
    }

    public function render()
    {
        $incident = $this->incident;
        $findings = IncidentFindings::select('incident_factor_id', 'completion_date')->where('incident_id', $this->incident->id)->get();
        $findings = $findings->groupBy('incident_factor_id', 'completion_date')->transform(function ($item, $key) {
            $count = $item->whereNotNull('completion_date')->count();
            if ($count > 0) {
                return $item->finalized = true;
            } else {
                return $item->finalized = false;
            }
        });
        $findings =  Arr::where($findings->toArray(), function ($value, $key) {
            return $value == false;
        });

        return view('livewire.incident.response.preventive-measure')->extends('layouts.app')->with(compact('incident', 'findings'));;
    }

    public function saveEvidence()
    {
        $this->validate([
            'photos.*' => 'max:2024', // 1MB Max
        ]);

        foreach ($this->photos as $photo) {
            $uploadedFile =  $photo->store('public/photos');
            $extension = explode('/', $uploadedFile);
            $filename = end($extension);
            $this->images[] = $filename;
        }
        $this->incident->evidence = $this->images;
        $this->incident->save();
    }

    public function finalizeIncident()
    {



        $this->validate([
            'incident.preventive_measure*' => 'required|min:5', // 1MB Max
        ]);
        $this->incident->save();
        Mail::to(env('OSH_EMAIL'))
            ->cc(Auth::user()->email)
            ->send(new IncidentClosed($this->incident, Auth::user()));
        $this->message('This Incident closure has been sent to OSH department.');
    }

    public function review($status)
    {
        $this->incident->finalized = $status;
        $this->incident->save();
        if ($this->incident->finalized) {
            $this->showModal('Incident Closed', 'Incident was closed Successfully', 'Incident was closed successfully');
        } else {
         //   dd($this->incident->assigned_to_email);
            $user =  User::where('email', $this->incident->assigned_to_email)->first();
          // dd($user);
            Mail::to($this->incident->assigned_to_email)->send(new IncidentReviewFailed($this->incident, $user));
            $this->message('A response has been sent to the Manager.');
        }
    }

    public function showModal($title, $subText, $information)
    {
        $this->message['title'] = $title;
        $this->message['subtext'] = $subText;
        $this->message['information'] = $information;
        // dd('here');
        $this->modalShow = true;
    }

    public function closeModal()
    {
        $this->modalShow = false;
    }


}
