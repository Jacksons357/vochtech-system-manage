<?php

namespace App\Livewire\EconomicGroups;

use Livewire\Component;
use App\Models\EconomicGroup;

class ModalForm extends Component
{
    public $showModal = false;
    public $name = '';
    public $editingId = null;
    public $confirmDelete = false;
    public $deleteId = null;

    protected $listeners = [
        'create-group' => 'openCreate',
        'edit-group'   => 'openEdit',
        'delete-group' => 'openDelete',
    ];

    public function openCreate()
    {
        $this->reset(['name', 'editingId']);
        $this->showModal = true;
    }

    public function openEdit($id)
    {
        $group = EconomicGroup::findOrFail($id);

        $this->editingId = $group->id;
        $this->name = $group->name;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:2'
        ]);

        EconomicGroup::updateOrCreate(
            ['id' => $this->editingId],
            ['name' => $this->name]
        );

        $this->dispatch('group-updated');
        $this->showModal = false;
    }

    public function openDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmDelete = true;
    }

    public function delete()
    {
        EconomicGroup::findOrFail($this->deleteId)->delete();
        $this->dispatch('group-updated');
        $this->confirmDelete = false;
    }

    public function render()
    {
        return view('livewire.economic-groups.modal-form');
    }
}
