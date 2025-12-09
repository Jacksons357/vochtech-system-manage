<?php

namespace App\Livewire\Employees;

use App\Exports\EmployeesExport;
use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Table extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = [
        'search' => ['except' => '', 'as' => 'q']
    ];

    protected $listeners = [
        'employee-updated' => '$refresh',
        'entity-deleted' => '$refresh',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->resetPage();
    }

    public function render()
    {
        $employees = Employee::query()
            ->with('unit')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%")
                    ->orWhere('cpf', 'like', "%{$this->search}%")
                    ->orWhereHas('unit', function ($q) {
                        $q->where('nome_fantasia', 'like', "%{$this->search}%");
                    });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.employees.table', [
            'employees' => $employees
        ]);
    }
}
