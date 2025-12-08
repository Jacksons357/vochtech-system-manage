<?php

namespace App\Livewire\EconomicGroups;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EconomicGroup;

class Table extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = [
        'search' => ['except' => '', 'as' => 'q']
    ];

    protected $listeners = [
        'group-updated' => '$refresh',
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
        $groups = EconomicGroup::query()
            ->with('flags')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.economic-groups.table', [
            'groups' => $groups
        ]);
    }
}
