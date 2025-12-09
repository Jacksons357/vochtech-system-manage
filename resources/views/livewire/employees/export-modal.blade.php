<div x-data="{ open: @entangle('showModal') }">
    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black/50">
        <div class="bg-white dark:bg-gray-800 dark:text-gray-200
                w-full max-w-md rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold mb-4">Exportar Colaboradores</h2>

            <!-- Filtros -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Filtrar por nome/email/CPF/Unidade</label>
                <input type="text" wire:model.debounce.500ms="search" class="border rounded-lg w-full px-3 py-2">
            </div>

            <!-- Botões -->
            <div class="flex justify-end gap-3 mt-4">
                <button @click="open = false" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg
                        dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-200 hover:cursor-pointer">
                    Cancelar
                </button>
                <button wire:click="exportExcel" class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 flex items-center gap-2 hover:cursor-pointer">
                    <flux:icon name="document" class="w-5 h-5" />
                    Exportar Excel
                </button>
            </div>
        </div>
    </div>
</div>