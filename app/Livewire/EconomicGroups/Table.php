<?php

namespace App\Livewire\EconomicGroups;

use Livewire\Component;
use Livewire\Attributes\Modelable;
use App\Models\EconomicGroup;

class Table extends Component
{
    #[Modelable]
    public $search = '';

    protected $listeners = [
        'group-updated' => '$refresh',
        'entity-deleted' => '$refresh',
    ];

    public function getRowsProperty()
    {
        return EconomicGroup::query()
            ->when(
                $this->search,
                fn($q) =>
                $q->where('name', 'like', "%{$this->search}%")
            )
            ->with('flags')
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.economic-groups.table', [
            'economicGroups' => $this->rows,
        ]);
    }
}
