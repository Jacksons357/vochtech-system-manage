<?php

namespace App\Livewire\Flags;

use Livewire\Component;
use App\Models\Flag;

class Index extends Component
{

    protected $listeners = [
        'flag-updated' => '$refresh'
    ];

    public function render()
    {
        $flags = Flag::with('economicGroup')
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.flags.index', compact('flags'));
    }
}
