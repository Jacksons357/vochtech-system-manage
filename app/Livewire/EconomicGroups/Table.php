<?php

namespace App\Livewire\EconomicGroups;

use Livewire\Component;

class Table extends Component
{
    public $economicGroups = [];

    protected $listeners = [
        'group-updated' => '$refresh',
        'entity-deleted' => '$refresh',
    ];

    public function mount($economicGroups)
    {
        $this->economicGroups = $economicGroups;
    }

    public function updatedEconomicGroups()
    {
        // Só para garantir re-render
    }

    public function render()
    {
        return view('livewire.economic-groups.table');
    }
}
