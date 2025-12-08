<div
    x-data="{ open: @entangle('showModal') }"
    x-show="open"
    x-transition
    class="fixed inset-0 flex items-center justify-center bg-black/50"
    style="display:none;">
    @if ($showModal)
    <div
        x-transition
        class="bg-white dark:bg-gray-800 dark:text-gray-200
                w-full max-w-md rounded-lg shadow-lg p-6">
        <h2 class="text-xl font-semibold mb-4">
            {{ $editingId ? 'Editar Grupo Econômico' : 'Novo Grupo Econômico' }}
        </h2>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 mb-1">
                Nome do Grupo
            </label>
            <input
                type="text"
                wire:model="name"
                class="border rounded-lg w-full px-3 py-2
                        focus:ring-2 focus:ring-blue-500
                        dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
            @error('name')
            <p class="text-red-500 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-2">
            <button
                class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg
                        dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-200 hover:cursor-pointer"
                @click="open = false">
                Cancelar
            </button>

            <button
                wire:click="save"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg hover:cursor-pointer">
                Salvar
            </button>
        </div>
    </div>
    @endif

    @if ($confirmDelete)
    <div class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg w-full max-w-sm">
            <h2 class="text-lg font-semibold mb-4 text-red-600">Excluir Grupo</h2>

            <p class="mb-6">
                Tem certeza que deseja excluir este grupo econômico?
            </p>

            <div class="flex justify-end space-x-2">
                <button wire:click="$set('confirmDelete', false)"
                    class="px-4 py-2 bg-gray-300 rounded-lg dark:bg-gray-700">
                    Cancelar
                </button>

                <button wire:click="delete"
                    class="px-4 py-2 bg-red-600 text-white rounded-lg">
                    Excluir
                </button>
            </div>
        </div>
    </div>
    @endif

</div>