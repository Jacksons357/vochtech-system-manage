<?php

namespace App\Livewire\Units;

use App\Models\Unit;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'unit-updated' => '$refresh'
    ];

    public function render()
    {
        $units = Unit::with('flag')
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.units.index', compact('units'));
    }
}
