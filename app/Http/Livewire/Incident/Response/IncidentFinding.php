<?php

namespace App\Http\Livewire\Incident\Response;

use App\Models\IncidentFactor;
use App\Models\IncidentFindings;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Arr;

class IncidentFinding extends Component
{
    public $finding;
    public $analysis = array();
    protected $listeners = ['update' => 'analysisChange'];
    protected $rules = [
        'finding.factor' => '',
        'finding.corrective_action' => 'required|min:5',
        'finding.rejected' => '',
        'finding.osh_remarks' => 'required|min:3',
        'finding.analysis' => '',

    ];
    public function mount($finding)
    {
        $this->finding = $finding;
        //dd($this->finding->analysis);
        $this->analysis = $this->finding->analysis;
        if (is_null($this->analysis)) {
            $this->analysis = [array('why' => '', 'containment' => ''), array('why' => '', 'containment' => '')];
        }
    }
    public function analysisChange($analysis, $key)
    {
        $this->analysis[$key] = $analysis;
        $this->finding->analysis =  $this->analysis;
        $this->finding->save();
    }
    public function addAnalysis()
    {

        $this->analysis[] = array('why' => '', 'containment' => '');
        //dd($this->analysis);
    }
    public function removeItem($index)
    {
        Arr::forget($this->analysis, $index);
        $this->updatedAnalysis();
    }
    public function updatedFinding()
    {
        $this->finding->save();
    }

    public function render()
    {
        return view('livewire.incident.response.incident-finding');
    }

    public function acceptCorrectiveAction()
    {
        $this->validate([
            'finding.osh_remarks' => 'required|min:3',
        ]);

        $this->finding->completion_date = Carbon::today();
        $this->updatedFinding();
    }
    public function rejectCorrectiveAction()
    {
        $this->validate([
            'finding.osh_remarks' => 'required|min:3',
        ]);
        $item =  IncidentFactor::find($this->finding->incident_factor_id);

        $this->finding->rejected = 1;
        $this->updatedFinding();
        IncidentFindings::firstOrCreate(array(
            'incident_factor_id' => $item->id,
            'incident_id' => $this->finding->incident_id,
            'factor' => $item->factor,
            'rejected'=>0
        ));

        $this->emit('findingChanged');
    }

    public function removeFinding(){
        $this->finding->delete();
        $this->emit('findingChanged');
    }
}
