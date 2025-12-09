<div>
    <div
        x-data="{ open: @entangle('showAlert') }"
        x-show="open"
        class="p-4 bg-yellow-200 text-yellow-800 rounded mb-4">
        {{ $alertMessage }}
    </div>

    <div class="p-6 rounded-lg">
        <h2 class="text-xl font-bold mb-4">Exportar Relatórios</h2>

        <div class="flex gap-3 mb-4">
            <select wire:model.live="entity" class="border rounded-lg px-3 py-2 w-full text-gray-300">
                <option value="">Selecione uma entidade</option>
                @foreach($entities as $name => $class)
                <option value="{{ $name }}">{{ $name }}</option>
                @endforeach
            </select>

            <input type="text" wire:model.defer="search" placeholder="Filtrar por nome ou campo relevante"
                class="border rounded-lg px-3 py-2 w-full">

            <button wire:click="export" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:cursor-pointer">Exportar Excel</button>
        </div>
    </div>
</div>