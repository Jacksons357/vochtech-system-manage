<?php

namespace App\Livewire\EconomicGroups;

use Illuminate\Support\Collection;
use Livewire\Component;

class Table extends Component
{
    public Collection $economicGroups;

    public function mount(Collection $economicGroups)
    {
        $this->economicGroups = $economicGroups;
    }

    public function render()
    {
        return view('livewire.economic-groups.table');
    }
}
