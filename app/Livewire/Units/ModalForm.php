<?php

namespace App\Livewire\Units;

use App\Models\Flag;
use App\Models\Unit;
use App\Traits\ValidatesCnpj;
use Livewire\Component;

class ModalForm extends Component
{
    use ValidatesCnpj;
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
        $messages = [
            'nome_fantasia.required' => 'Informe o nome fantasia da unidade.',
            'nome_fantasia.min'      => 'O nome fantasia deve ter no mínimo 2 caracteres.',

            'razao_social.required'  => 'Informe a razão social da unidade.',
            'razao_social.min'       => 'A razão social deve ter no mínimo 2 caracteres.',

            'cnpj.required'          => 'Informe o CNPJ da unidade.',
            'cnpj.min'               => 'O CNPJ deve conter pelo menos 14 números.',
            'cnpj.max'               => 'O CNPJ deve conter no máximo 18 caracteres.',

            'flag_id.required'       => 'Selecione uma bandeira.',
            'flag_id.exists'         => 'A bandeira selecionada é inválida.',
        ];

        $this->validate([
            'nome_fantasia' => 'required|min:2',
            'razao_social'  => 'required|min:2',
            'cnpj'          => 'required|min:14|max:18',
            'flag_id'       => 'required|exists:flags,id',
        ], $messages);

        if (!$this->validateCnpj($this->cnpj)) {
            $this->addError('cnpj', 'O CNPJ informado é inválido.');
            return;
        }

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
