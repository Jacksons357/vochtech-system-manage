<div class="p-6">

    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3 w-1/2">

            <input
                type="text"
                wire:model.live="search"
                placeholder="Pesquisar unidades..."
                class="border rounded-lg px-3 py-2 w-full ">

            @if($search)
            <button wire:click="clearFilter"
                class="px-3 py-2 bg-gray-200 rounded-lg hover:cursor-pointer">Limpar</button>
            @endif
        </div>

        <button wire:click="$dispatch('create-unit')"
            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:cursor-pointer">
            + Adicionar Unidade
        </button>
    </div>

    <livewire:units.table :units="$units" wire:key="units-{{ $units->count() }}" />

    <livewire:units.modal-form />
    <livewire:components.delete-modal />

</div>