<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class AuditResponse extends Component
{
    use WithFileUploads;
    public $item;
    public $evidenceFiles = [];
    public $evidence = [];

    protected $rules = [
        'item.item' => 'required',
        'item.response' => '',
        'item.finding' => '',
        'item.root_cause' => '',
        'item.close_gap' => '',
        'item.root_cause_correction' => '',
        'item.root_cause_correction_by' => '',
        'item.root_cause_correction_date' => '',
        'item.root_cause_correction_review' => '',
        'item.root_cause_correction_review_remarks' => '',
        'item.root_cause_correction_review_by' => '',
        'item.conformity_level' => 'required_if:non_conformity,1',
        'item.evidence' => '',
        'evidenceFiles' => '',
        'evidence' => '',
    ];
    public function mount($item)
    {
        $this->item = $item;
        $this->evidence = json_decode($this->item->evidence);
    }

    public function render()
    {
        return view('livewire.audit-response');
    }
    public function saveEvidence()
    {
        $this->validate([
            'evidenceFiles.*' => 'max:5024', // 1MB Max
        ]);
        $evidence_array = array();
        foreach ($this->evidenceFiles as $evidence) {
            $uploadedFile =  $evidence->store('public/evidence');
            $extension = explode('/', $uploadedFile);
            $filename = end($extension);
            $evidence_array[] = $filename;
        }
        //dd($evidence_array);
        $this->item->evidence =    $evidence_array;
        $this->item->save();
    }
    public function updated()
    {
        $this->validate();

        $this->item->save();
    }
}
