<?php

namespace App\Http\Livewire;

use App\Models\Audit;
use App\Models\AuditItem;
use App\Models\Checklist;
use App\Models\Department;
use App\Models\User;
use Livewire\Component;

class AuditCreator extends Component
{
    public $audit_id = null;

    public $done_on;
    public $auditee;
    public $department;
    public $interviewed;
    public $other_details;
    public $checklist_id;
    public $audit_name;
    public $audit_entity;
    public $checklist_items = null;



    public function checklistChanged()
    {
        $this->checklist_items = Checklist::with(['ChecklistItems' => function ($query) {
            $query->orderBy('order', 'desc');
        }])->where('id', $this->checklist_id)->first();
    }

    public function render()
    {
        $audit = array();
        if ($this->audit_id != null) {
            $audit = Audit::with(['AuditItems' => function ($query) {
                $query->orderBy('order', 'desc');
            }])->where('id', $this->checklist_id)->first();
            $this->name = $this->list->name;
        }
        $departments = Department::all()->pluck('name', 'id');
        $checklists = Checklist::all()->pluck('name', 'id');
        $users = User::all()->pluck('name', 'id');

        return view('livewire.audit-creator')->with(compact('audit', 'departments', 'checklists','users'));
    }

    public function saveAudit()
    {
        $audit = Audit::create(array(
            'audit_name' => $this->audit_name,
            'audit_entity' => $this->audit_entity,
            'doneOn' => $this->done_on,
            'auditee' => $this->auditee,
            'department' => $this->department,
            'interviewed' => $this->interviewed,
            'other_details' => $this->other_details,
            'checklistId' => $this->checklist_id,
        ));
        $items = Checklist::with(['ChecklistItems' => function ($query) {
            $query->orderBy('order', 'desc');
        }])->where('id', $this->checklist_id)->first();
        $items_array = array();
        foreach ($items->ChecklistItems as $item) {
            $items_array[] = new AuditItem(['checklist_id' => $item->id, 'item' => $item->item, 'subcategory' => $item->subcategory, 'required_response' => $item->required_response]);
        }
        $audit->AuditItems()->saveMany($items_array);
    }

    public function updateAudit($id)
    {
    }
}
