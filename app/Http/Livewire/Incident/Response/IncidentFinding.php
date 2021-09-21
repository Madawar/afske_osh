<?php

namespace App\Http\Livewire\Incident\Response;

use Livewire\Component;
use Illuminate\Support\Arr;
class IncidentFinding extends Component
{
    public $finding;
    public $analysis = array();

    protected $rules = [
        'finding.factor' => '',
        'finding.corrective_action' => '',
        'finding.rejected' => '',
        'finding.osh_remarks' => '',
        'finding.analysis' => '',

    ];
    public function mount($finding)
    {
        $this->finding = $finding;
//dd($this->finding->analysis);
        $this->analysis = $this->finding->analysis ;
        if(is_null($this->analysis)){
            $this->analysis = array('why' => '', 'containment' => '');
        }
    }

    public function addAnalysis(){
//dd($this->analysis);
       $this->analysis[] =array('why' => '', 'containment' => ''); ;
    }
    public function removeItem($index){
        Arr::forget($this->analysis, $index);
        $this->updatedAnalysis();
    }
    public function updatedFinding(){
        $this->finding->save();
    }
    public function updatedAnalysis(){
        $this->finding->analysis = $this->analysis;
        $this->finding->save();
    }
    public function render()
    {
        return view('livewire.incident.response.incident-finding');
    }
}
