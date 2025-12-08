<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;

class Index extends Component
{
    public $search = '';

    protected $listeners = [
        'unit-updated' => '$refresh'
    ];

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function clearFilter()
    {
        $this->reset('search');
    }

    public function render()
    {
        $employees = Employee::with('unit')
            ->where('name', 'like', "%{$this->search}%")
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.employees.index', compact('employees'));
    }
}
