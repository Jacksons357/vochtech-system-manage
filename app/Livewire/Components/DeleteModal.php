<?php

namespace App\Livewire\Components;

use Livewire\Component;

class DeleteModal extends Component
{
    public $confirming = false;
    public $deleteId = null;
    public $modelClass = null;

    protected $listeners = [
        'open-delete-modal' => 'open',
    ];

    public function open($id, $modelClass)
    {
        $this->deleteId = $id;
        $this->modelClass = $modelClass;
        $this->confirming = true;
    }

    public function delete()
    {
        $model = $this->modelClass;
        $model::findOrFail($this->deleteId)->delete();

        $this->dispatch('entity-deleted');
        $this->confirming = false;
    }

    public function render()
    {
        return view('livewire.components.delete-modal');
    }
}
