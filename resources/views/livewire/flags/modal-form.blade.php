<div
    x-data="{ open: @entangle('showModal') }"
    x-show="open"
    x-transition
    class="fixed inset-0 flex items-center justify-center bg-black/50"
    style="display:none;">
    @if($showModal)
    <div class="bg-white dark:bg-gray-800 dark:text-gray-200
                w-full max-w-md rounded-lg shadow-lg p-6">

        <h2 class="text-xl font-semibold mb-4">
            {{ $editingId ? 'Editar Bandeira' : 'Nova Bandeira' }}
        </h2>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 mb-1" for="flag_name">Nome da Bandeira</label>
            <input type="text" id="flag_name" wire:model="name"
                class="border rounded-lg w-full px-3 py-2">
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 mb-1" for="economic_group_id">Grupo Econômico</label>
            <select wire:model="economic_group_id"
                class="border rounded-lg w-full px-3 py-2 bg-white dark:bg-gray-800 dark:text-gray-200
                w-full max-w-md rounded-lg shadow-lg p-6"
                id="economic_group_id">
                <option value="">Selecione...</option>

                @foreach($groups as $g)
                <option value="{{ $g->id }}">{{ $g->name }}</option>
                @endforeach
            </select>
            @error('economic_group_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end space-x-2">
            <button @click="open=false" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg
                        dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-200 hover:cursor-pointer">
                Cancelar
            </button>
            <button wire:click="save" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg hover:cursor-pointer">
                Salvar
            </button>
        </div>

    </div>
    @endif
</div>