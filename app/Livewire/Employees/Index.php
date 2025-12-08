<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'employee-updated' => '$refresh'
    ];

    public function render()
    {
        $employees = Employee::with('unit')
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.employees.index', compact('employees'));
    }
}
