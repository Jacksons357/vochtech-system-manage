<div class="p-6">
    <!-- Top bar -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Grupos Econômicos</h1>

        <button
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg hover:cursor-pointer"
            wire:click="$dispatch('create-group')">
            + Adicionar Grupo
        </button>
    </div>

    <!-- Tabela com busca + paginação -->
    <livewire:economic-groups.table wire:key="economic-groups-table" />

    <!-- Modais -->
    <livewire:economic-groups.modal-form />
    <livewire:components.delete-modal />
    <livewire:economic-groups.flags-modal />
</div>