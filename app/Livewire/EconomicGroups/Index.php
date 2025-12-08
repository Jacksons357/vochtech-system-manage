<?php

namespace App\Livewire\EconomicGroups;

use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'group-updated' => '$refresh',
        'entity-deleted' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.economic-groups.index');
    }
}
