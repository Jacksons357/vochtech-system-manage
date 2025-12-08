<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;

class Table extends Component
{
    public $employees = [];

    protected $listeners = [
        'employee-updated' => '$refresh',
        'entity-deleted' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.employees.table', [
            'employees' => Employee::with('unit')->orderBy('id', 'desc')->get()
        ]);
    }
}
