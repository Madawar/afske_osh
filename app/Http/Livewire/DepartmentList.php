<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;
use App\Models\User;

class DepartmentList extends Component
{
    public $name;
    public $manager;

    protected $rules = [
        'name' => 'required|min:3',
        'manager_id' => '',

    ];

    public function render()
    {
        $departments = Department::with('owner')->paginate(10);
        $managers = User::all();
        return view('livewire.department-list')->with(compact('departments', 'managers'));
    }

    public function addDepartment()
    {
        Department::create(array(
            'name' => $this->name,
            'manager_id' => $this->manager
        ));
    }
    public function removeDepartment($id)
    {
        Department::destroy($id);
    }
}
