<div class="p-6">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Colaboradores</h1>

        <button wire:click="$dispatch('create-employee')"
            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:cursor-pointer">
            + Adicionar Funcionário
        </button>
    </div>

    <livewire:employees.table :employees="$employees" wire:key="employees-{{ $employees->count() }}" />

    <livewire:employees.modal-form />
    <livewire:components.delete-modal />

</div>