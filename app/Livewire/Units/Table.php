<?php

namespace App\Livewire\Units;

use App\Models\Unit;
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
        'unit-updated' => '$refresh',
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
        $units = Unit::query()
            ->with('flag')
            ->when($this->search, function ($query) {
                $query->where('nome_fantasia', 'like', "%{$this->search}%")
                    ->orWhere('razao_social', 'like', "%{$this->search}%")
                    ->orWhere('cnpj', 'like', "%{$this->search}%")
                    ->orWhereHas('flag', function ($q) {
                        $q->where('name', 'like', "%{$this->search}%");
                    });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.units.table', [
            'units' => $units
        ]);
    }
}
