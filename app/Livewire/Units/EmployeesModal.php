<?php

namespace App\Livewire\Units;

use Livewire\Component;
use App\Models\Unit;

class EmployeesModal extends Component
{
    public $showModal = false;
    public $unit;
    public $employees = [];

    protected $listeners = [
        'open-employees-modal' => 'open'
    ];

    public function open($data = [])
    {
        if (!isset($data['id'])) {
            return;
        }

        $this->unit = Unit::with('employees')->findOrFail($data['id']);
        $this->employees = $this->unit->employees;

        $this->showModal = true;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.units.employees-modal');
    }
}
