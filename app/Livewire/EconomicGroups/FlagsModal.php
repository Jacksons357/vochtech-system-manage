<?php

namespace App\Livewire\EconomicGroups;

use Livewire\Component;
use App\Models\EconomicGroup;

class FlagsModal extends Component
{
    public $showModal = false;
    public $group;
    public $flags = [];

    protected $listeners = [
        'open-flags-modal' => 'open'
    ];

    public function open($data = [])
    {
        if (!isset($data['id'])) {
            return;
        }

        $this->group = EconomicGroup::with('flags')->findOrFail($data['id']);
        $this->flags = $this->group->flags;

        $this->showModal = true;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.economic-groups.flags-modal');
    }
}
