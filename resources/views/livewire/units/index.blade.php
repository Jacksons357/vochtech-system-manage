<div class="p-6">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Unidades</h1>

        <button wire:click="$dispatch('create-unit')"
            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:cursor-pointer">
            + Adicionar Unidade
        </button>
    </div>

    <livewire:units.table :units="$units" wire:key="units-{{ $units->count() }}" />

    <livewire:units.modal-form />
    <livewire:components.delete-modal />
    <livewire:units.employees-modal />

</div>