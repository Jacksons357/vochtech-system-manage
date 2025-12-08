<?php

namespace App\Livewire\EconomicGroups;

use Livewire\Component;
use App\Models\EconomicGroup;

class Index extends Component
{
    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected $listeners = [
        'group-updated' => '$refresh',
        'entity-deleted' => '$refresh',
    ];

    public function clearFilter()
    {
        $this->reset('search');
    }

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
        return view('livewire.economic-groups.index', [
            'economicGroups' => $this->rows,
        ]);
    }
}
