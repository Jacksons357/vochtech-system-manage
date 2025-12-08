<div class="p-6">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Bandeiras</h1>

        <button wire:click="$dispatch('create-flag')"
            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:cursor-pointer">
            + Adicionar Bandeira
        </button>
    </div>

    <livewire:flags.table :flags="$flags" wire:key="flags-{{ $flags->count() }}" />

    <livewire:flags.modal-form />
    <livewire:components.delete-modal />
    <livewire:flags.units-modal />

</div>