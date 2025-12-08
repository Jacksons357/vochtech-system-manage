<?php

namespace App\Livewire\Units;

use App\Models\Flag;
use App\Models\Unit;
use Livewire\Component;

class ModalForm extends Component
{
    public $showModal = false;

    public $editingId = null;

    // Campos
    public $nome_fantasia = '';
    public $razao_social = '';
    public $cnpj = '';
    public $flag_id = '';

    protected $listeners = [
        'create-unit' => 'openCreate',
        'edit-unit'   => 'openEdit',
        'delete-unit' => 'openDelete',
    ];

    public function openCreate()
    {
        $this->reset(['editingId', 'nome_fantasia', 'razao_social', 'cnpj', 'flag_id']);
        $this->showModal = true;
    }

    public function openEdit($id)
    {
        $unit = Unit::findOrFail($id);

        $this->editingId   = $unit->id;
        $this->nome_fantasia = $unit->nome_fantasia;
        $this->razao_social = $unit->razao_social;
        $this->cnpj = $unit->cnpj;
        $this->flag_id = $unit->flag_id;

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate([
            'nome_fantasia' => 'required|min:2',
            'razao_social'  => 'required|min:2',
            'cnpj'          => 'required|min:14|max:18',
            'flag_id'       => 'required|exists:flags,id',
        ]);

        Unit::updateOrCreate(
            ['id' => $this->editingId],
            [
                'nome_fantasia' => $this->nome_fantasia,
                'razao_social'  => $this->razao_social,
                'cnpj'          => $this->cnpj,
                'flag_id'       => $this->flag_id,
            ]
        );

        $this->dispatch('unit-updated');
        $this->showModal = false;
    }

    public $confirmDelete = false;
    public $deleteId = null;

    public function openDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmDelete = true;
    }

    public function delete()
    {
        Unit::findOrFail($this->deleteId)->delete();

        $this->dispatch('unit-updated');
        $this->confirmDelete = false;
    }

    public function render()
    {
        return view('livewire.units.modal-form', [
            'flags' => Flag::orderBy('name')->get(),
        ]);
    }
}
