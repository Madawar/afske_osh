<?php

namespace App\Http\Livewire;

use App\Models\Checklist;
use App\Models\ChecklistItem;
use Livewire\Component;

class ChecklistCreator extends Component
{
    public $name;
    public $checklist_id = null;

    //List
    public $item;
    public $subcategory;
    public $required_response;
    public $list;

    public function render()
    {
        $this->list = array();
        if ($this->checklist_id != null) {
            $this->list = Checklist::with(['ChecklistItems' => function ($query) {
                $query->orderBy('order', 'desc');
            }])->where('id', $this->checklist_id)->first();
            $this->name = $this->list->name;
        }
        return view('livewire.checklist-creator')->with(compact($this->list));
    }

    public function SaveChecklist()
    {
        $this->validate(
            array(
                'name' => 'min:5|required'
            )
        );
        $checklist =  Checklist::create(array(
            'name' => $this->name
        ));

        $this->checklist_id = $checklist->id;
    }

    public function AddChecklistItem()
    {
        $this->validate(
            array(
                'item' => 'min:5|required',
                'required_response' => 'required'
            )
        );
        ChecklistItem::create(array(
            'checklist_id' => $this->checklist_id,
            'item' => $this->item,
            'subcategory' => $this->subcategory,
            'required_response' => $this->required_response
        ));
    }
}
