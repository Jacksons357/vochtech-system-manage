<?php

namespace App\Livewire\EconomicGroups;

use Livewire\Component;
use App\Models\EconomicGroup;

class Index extends Component
{
    public $search = '';

    protected $listeners = [
        'group-updated' => '$refresh'
    ];

    public function render()
    {
        $economicGroups = EconomicGroup::where('name', 'like', "%{$this->search}%")
            ->with('flags')
            ->get();

        return view('livewire.economic-groups.index', compact('economicGroups'));
    }
}
