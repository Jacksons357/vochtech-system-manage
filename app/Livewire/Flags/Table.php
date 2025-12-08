<?php

namespace App\Livewire\Flags;

use App\Models\Flag;
use Livewire\Component;

class Table extends Component
{
    public $flags = [];

    protected $listeners = [
        'flag-updated' => '$refresh',
        'entity-deleted' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.flags.table', [
            'flags' => Flag::with('economicGroup')->orderBy('id', 'desc')->get()
        ]);
    }
}
