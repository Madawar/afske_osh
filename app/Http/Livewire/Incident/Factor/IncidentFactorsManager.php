<?php

namespace App\Http\Livewire\Incident\Factor;

use App\Models\Incident;
use Livewire\Component;
use App\Models\IncidentFactor;

class IncidentFactorsManager extends Component
{
    public $category;
    public $factor;
    public $modalShow = null;
    public $delete_item = null;
    protected $rules = [
        'category' => 'required|min:5',
        'factor' => 'min:3',
    ];
    public function render()
    {
        $factors = IncidentFactor::select('category', 'factor')->get();
        $factor_group =  $factors->groupBy('category');
        return view('livewire.incident.factor.incident-factors-manager')->extends('layouts.app')->with(compact('factor_group'));
    }

    public function save()
    {
        $this->validate();
        IncidentFactor::create(array(
            'category' => $this->category,
            'factor' => $this->factor,
        ));
        $this->category = null;
        $this->factor = null;
    }

    public function deleteQuestion($id)
    {
        $this->modalShow = true;
        $this->delete_item = $id;
    }
    public function delete()
    {
        IncidentFactor::destroy($this->delete_item);
        $this->modalShow = false;
        $this->delete_item = null;
    }
}
