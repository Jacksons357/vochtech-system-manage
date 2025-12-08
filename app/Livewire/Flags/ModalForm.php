<?php

namespace App\Livewire\Flags;

use Livewire\Component;
use App\Models\Flag;
use App\Models\EconomicGroup;

class ModalForm extends Component
{
    public $showModal = false;
    public $name = '';
    public $economic_group_id = '';
    public $editingId = null;

    public $confirmDelete = false;
    public $deleteId = null;

    protected $listeners = [
        'create-flag' => 'openCreate',
        'edit-flag'   => 'openEdit',
        'delete-flag' => 'openDelete',
    ];

    public function openCreate()
    {
        $this->reset(['name', 'economic_group_id', 'editingId']);
        $this->showModal = true;
    }

    public function openEdit($id)
    {
        $flag = Flag::findOrFail($id);

        $this->editingId = $flag->id;
        $this->name = $flag->name;
        $this->economic_group_id = $flag->economic_group_id;

        $this->showModal = true;
    }

    public function save()
    {
        $messages = [
            'name.required'             => 'Informe o nome da bandeira.',
            'name.min'                  => 'O nome da bandeira deve ter no mínimo 2 caracteres.',
            'economic_group_id.required' => 'Selecione um grupo econômico.',
            'economic_group_id.exists'  => 'O grupo econômico selecionado é inválido.',
        ];

        $this->validate([
            'name'              => 'required|min:2',
            'economic_group_id' => 'required|exists:economic_groups,id',
        ], $messages);

        Flag::updateOrCreate(
            ['id' => $this->editingId],
            [
                'name' => $this->name,
                'economic_group_id' => $this->economic_group_id
            ]
        );

        $this->dispatch('flag-updated');
        $this->showModal = false;
    }

    public function openDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmDelete = true;
    }

    public function delete()
    {
        Flag::findOrFail($this->deleteId)->delete();
        $this->dispatch('flag-updated');
        $this->confirmDelete = false;
    }

    public function render()
    {
        return view('livewire.flags.modal-form', [
            'groups' => EconomicGroup::orderBy('name')->get()
        ]);
    }
}
