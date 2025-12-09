<?php

namespace App\Livewire\Logs;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Activitylog\Models\Activity;

class Table extends Component
{
    use WithPagination;

    public $search = '';
    public $userFilter = '';
    public $modelFilter = '';

    protected $queryString = [
        'search' => ['except' => '', 'as' => 'q'],
        'userFilter' => ['except' => '', 'as' => 'uf'],
        'modelFilter' => ['except' => '', 'as' => 'mf'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingUserFilter()
    {
        $this->resetPage();
    }

    public function updatingModelFilter()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->reset(['search', 'userFilter', 'modelFilter']);
        $this->resetPage();
    }

    public function render()
    {
        $logs = Activity::with('causer')
            ->when(
                $this->search,
                fn($q) =>
                $q->where('description', 'like', "%{$this->search}%")
            )
            ->when($this->userFilter, function ($q) {
                $q->whereHas('causer', function ($u) {
                    $u->where('name', 'like', "%{$this->userFilter}%");
                });
            })
            ->when(
                $this->modelFilter,
                fn($q) =>
                $q->where('subject_type', 'like', "%{$this->modelFilter}%")
            )
            ->latest()
            ->paginate(10);

        return view('livewire.logs.table', compact('logs'));
    }
}
