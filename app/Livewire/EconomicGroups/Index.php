<?php

namespace App\Livewire\EconomicGroups;

use Livewire\Component;

class Index extends Component
{
    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function render()
    {
        return view('livewire.economic-groups.index');
    }
}
