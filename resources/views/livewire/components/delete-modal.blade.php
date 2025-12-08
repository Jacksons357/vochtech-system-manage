<div>
    @if($confirming)
    <div class="fixed inset-0 bg-black/50 z-40"></div>

    <div class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-xl w-96">

            <h2 class="text-xl font-semibold mb-4">Confirmar exclusão</h2>
            <p class="text-gray-600 mb-6">Tem certeza que deseja excluir este item?</p>

            <div class="flex justify-end space-x-3">
                <button wire:click="$set('confirming', false)"
                    class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 hover:cursor-pointer">
                    Cancelar
                </button>

                <button wire:click="delete"
                    class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700 hover:cursor-pointer">
                    Excluir
                </button>
            </div>
        </div>
    </div>
    @endif
</div>