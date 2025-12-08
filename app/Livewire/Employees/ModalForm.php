<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use App\Models\Unit;
use App\Traits\ValidatesCpf;
use App\Traits\ValidatesEmail;
use Livewire\Component;

class ModalForm extends Component
{
    use ValidatesCpf;
    use ValidatesEmail;

    public $showModal = false;

    public $editingId = null;

    public $name = '';
    public $email = '';
    public $cpf = '';
    public $unit_id = '';

    protected $listeners = [
        'create-employee' => 'openCreate',
        'edit-employee'   => 'openEdit',
        'delete-employee' => 'openDelete',
    ];

    public function openCreate()
    {
        $this->reset(['editingId', 'name', 'email', 'cpf', 'unit_id']);
        $this->showModal = true;
    }

    public function openEdit($id)
    {
        $employee = Employee::findOrFail($id);

        $this->editingId = $employee->id;
        $this->name      = $employee->name;
        $this->email     = $employee->email;
        $this->cpf       = $employee->cpf;
        $this->unit_id   = $employee->unit_id;

        $this->showModal = true;
    }

    public function save()
    {
        $messages = [
            'name.required' => 'Informe o nome do funcionário.',
            'name.min'      => 'O nome deve ter no mínimo 2 caracteres.',

            'email.required'  => 'Informe o email do funcionário.',
            'email.min'       => 'O email deve ter no mínimo 2 caracteres.',

            'cpf.required'          => 'Informe o CPF do funcionário.',
            'cpf.min'               => 'O CPF deve conter pelo menos 11 números.',
            'cpf.max'               => 'O CPF deve conter no máximo 14 caracteres.',

            'unit_id.required'       => 'Selecione uma unidade.',
            'unit_id.exists'         => 'A unidade selecionada é inválida.',
        ];

        $this->validate([
            'name' => 'required|min:2',
            'email'  => 'required|min:2',
            'cpf'          => 'required|min:11|max:14',
            'unit_id'       => 'required|exists:units,id',
        ], $messages);

        if (!$this->validateCpf($this->cpf)) {
            $this->addError('cpf', 'O CPF informado é inválido.');
            return;
        }

        if (!$this->validateEmail($this->email)) {
            $this->addError('email', 'O email informado é inválido.');
            return;
        }

        Employee::updateOrCreate(
            ['id' => $this->editingId],
            [
                'name' => $this->name,
                'email'  => $this->email,
                'cpf'          => $this->cpf,
                'unit_id'       => $this->unit_id,
            ]
        );

        $this->dispatch('employee-updated');
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
        Employee::findOrFail($this->deleteId)->delete();

        $this->dispatch('employee-updated');
        $this->confirmDelete = false;
    }

    public function render()
    {
        return view('livewire.employees.modal-form', [
            'units' => Unit::orderBy('nome_fantasia')->get(),
        ]);
    }
}
