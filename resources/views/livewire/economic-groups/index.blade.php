<div class="p-6">

    <div class="flex items-center justify-between mb-6">

        <input
            type="text"
            wire:model.live="search"
            placeholder="Pesquisar grupos..."
            class="border rounded-lg px-3 py-2 w-1/2
                   focus:ring-2 focus:ring-blue-500
                   dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700">

        <button
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg hover:cursor-pointer"
            wire:click="$dispatch('create-group')">
            + Adicionar Grupo
        </button>

    </div>

    <!-- TABELA -->
    <livewire:economic-groups.table
        wire:model.live="search" />

    <livewire:economic-groups.modal-form />
    <livewire:components.delete-modal />
</div>