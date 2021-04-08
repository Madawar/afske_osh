<?php

namespace App\Http\Livewire;

use App\Models\ChecklistItem;
use Livewire\Component;

class AuditItem extends Component
{
    public $item;

    protected $rules = [
        'item.item' => 'required',
        'item.response' => '',
        'item.finding' => '',
        'item.conformity_level'=>'required_if:non_conformity,1'
    ];
    public function mount($item)
    {
        $this->item = $item;

    }

    public function render()
    {
        return view('livewire.audit-item');
    }

    public function updated()
    {
        if($this->item->required_response != $this->item->response){
            $this->item->non_conformity = 1;
            //Generate CAPA Number;
        }else{
            $this->item->non_conformity = 0;
        }
        $this->validate();
        $this->item->save();
    }
}
