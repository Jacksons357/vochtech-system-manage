<?php

namespace App\Livewire\Flags;

use App\Models\Flag;
use Livewire\Component;

class UnitsModal extends Component
{
    public $showModal = false;
    public $flag;
    public $units = [];

    protected $listeners = [
        'open-units-modal' => 'open'
    ];

    public function open($data = [])
    {
        if (!isset($data['id'])) {
            return;
        }

        $this->flag = Flag::with('units')->findOrFail($data['id']);
        $this->units = $this->flag->units;

        $this->showModal = true;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.flags.units-modal');
    }
}
