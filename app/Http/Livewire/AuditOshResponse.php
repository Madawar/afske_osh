<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AuditOshResponse extends Component
{

    public $item;

    protected $rules = [
        'item.item' => 'required',
        'item.response' => '',
        'item.finding' => '',
        'item.root_cause' => '',
        'item.root_cause_correction' => '',
        'item.root_cause_correction_by' => '',
        'item.root_cause_correction_date' => '',
        'item.root_cause_correction_review' => '',
        'item.root_cause_correction_review_remarks' => '',
        'item.root_cause_correction_review_by' => '',
        'item.conformity_level' => 'required_if:non_conformity,1'
    ];
    public function mount($item)
    {
        $this->item = $item;
    }

    public function render()
    {
        return view('livewire.audit-osh-response');
    }

    public function updated()
    {
        $this->validate();
        $this->item->save();
    }
}
