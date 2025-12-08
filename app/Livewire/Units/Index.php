<?php

namespace App\Livewire\Units;

use App\Models\Unit;
use Livewire\Component;

class Index extends Component
{
    public $search = '';

    protected $listeners = [
        'unit-updated' => '$refresh'
    ];

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function clearFilter()
    {
        $this->reset('search');
    }

    public function render()
    {
        $units = Unit::with('flag')
            ->where('nome_fantasia', 'like', "%{$this->search}%")
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.units.index', compact('units'));
    }
}
