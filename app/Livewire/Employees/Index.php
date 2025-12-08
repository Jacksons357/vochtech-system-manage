<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;

class Index extends Component
{
    public $search = '';

    protected $listeners = [
        'employee-updated' => '$refresh'
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
            ->where(function ($query) {
                $query->where('name', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%")
                    ->orWhere('cpf', 'like', "%{$this->search}%")
                    ->orWhereHas('unit', function ($q) {
                        $q->where('nome_fantasia', 'like', "%{$this->search}%");
                    });
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.employees.index', compact('employees'));
    }
}
