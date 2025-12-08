<?php

namespace App\Livewire\Units;

use App\Models\Unit;
use Livewire\Component;

class Table extends Component
{
    public $units = [];

    protected $listeners = [
        'unit-updated' => '$refresh',
        'entity-deleted' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.units.table', [
            'units' => Unit::with('flag')->orderBy('id', 'desc')->get()
        ]);
    }
}
