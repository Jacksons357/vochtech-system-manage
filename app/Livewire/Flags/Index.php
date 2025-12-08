<?php

namespace App\Livewire\Flags;

use Livewire\Component;
use App\Models\Flag;

class Index extends Component
{
    public $search = '';

    protected $listeners = [
        'flag-updated' => '$refresh'
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
        $flags = Flag::with('economicGroup')
            ->where('name', 'like', "%{$this->search}%")
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.flags.index', compact('flags'));
    }
}
