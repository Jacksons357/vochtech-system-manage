<?php

namespace App\Livewire\Flags;

use App\Models\Flag;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = [
        'search' => ['except' => '', 'as' => 'q']
    ];

    protected $listeners = [
        'flag-updated' => '$refresh',
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
        $flags = Flag::query()
            ->with('economicGroup')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', "%{$this->search}%")
                    ->orWhereHas('economicGroup', function ($q) {
                        $q->where('name', 'like', "%{$this->search}%");
                    });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.flags.table', [
            'flags' => $flags
        ]);
    }
}
