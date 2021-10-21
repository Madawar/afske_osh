<?php

namespace App\Http\Livewire\Incident\Response;

use Livewire\Component;

class Why extends Component
{
    public $analysis;
    public $finding;
    public $key;

    public function render()
    {
        return view('livewire.incident.response.why');
    }
    public function updatedAnalysis()
    {
        $this->emit('update',$this->analysis,$this->key);
       // dd('here');
        //    $this->finding->analysis = $this->analysis;
        //    $this->finding->save();
    }
}
