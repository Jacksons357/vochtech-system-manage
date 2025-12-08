<?php

namespace App\Livewire\EconomicGroups;

use App\Models\EconomicGroup;
use Illuminate\Support\Collection;
use Livewire\Component;

class Table extends Component
{
    protected $listeners = [
        'group-updated' => '$refresh',
        'entity-deleted' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.economic-groups.table', [
            'economicGroups' => EconomicGroup::with('flags')->get()
        ]);
    }
}
