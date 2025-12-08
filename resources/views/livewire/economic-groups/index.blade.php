<div class="p-6">

    <!-- Top bar -->
    <div class="flex items-center justify-between mb-6">

        <div class="flex items-center gap-3 w-1/2">
            <input
                type="text"
                wire:model.live="search"
                placeholder="Pesquisar por nome..."
                class="border rounded-lg px-3 py-2 w-full">

            @if($search)
            <button
                wire:click="clearFilter"
                class="px-3 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300
                           dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                Limpar
            </button>
            @endif
        </div>

        <button
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg hover:cursor-pointer"
            wire:click="$dispatch('create-group')">
            + Adicionar Grupo
        </button>
    </div>

    <!-- Tabela -->
    <livewire:economic-groups.table
        :economicGroups="$economicGroups"
        wire:key="economic-groups-table-{{ $search }}" />

    <!-- Modals -->
    <livewire:economic-groups.modal-form />
    <livewire:components.delete-modal />
    <livewire:economic-groups.flags-modal />
</div>