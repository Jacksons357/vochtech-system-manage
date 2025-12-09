<div class="p-6">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Colaboradores</h1>

        <button wire:click="$dispatch('create-employee')"
            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:cursor-pointer flex items-center gap-2">
            <flux:icon name="plus" class="w-5 h-5" />
            Adicionar Funcionário
        </button>
    </div>

    <livewire:employees.table :employees="$employees" wire:key="employees-{{ $employees->count() }}" />

    <livewire:employees.modal-form />
    <livewire:components.delete-modal />

</div>