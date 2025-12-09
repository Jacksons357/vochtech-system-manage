<?php

namespace App\Livewire\Employees;

use Livewire\Component;
use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportModal extends Component
{
    public $showModal = false;
    public $search = '';
    public $unit_id = null;

    protected $listeners = [
        'open-export-modal' => 'openModal'
    ];

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function exportExcel()
    {
        $this->closeModal();
        return Excel::download(new EmployeesExport($this->search, $this->unit_id), 'colaboradores.xlsx');
    }

    public function render()
    {
        return view('livewire.employees.export-modal');
    }
}
