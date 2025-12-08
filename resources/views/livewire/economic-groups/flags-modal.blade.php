<div
    x-data
    @open-flags-modal.window="$wire.open($event.detail)">
    @if($showModal)
    <div class="fixed inset-0 flex items-center justify-center bg-black/50">

        <div class="bg-white dark:bg-gray-800 w-full max-w-lg rounded-lg shadow-lg p-6">

            <h2 class="text-xl font-semibold mb-4">
                Bandeiras do grupo: <span class="text-blue-600">{{ $group->name }}</span>
            </h2>

            <div class="max-h-80 overflow-y-auto border rounded-lg">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-left">Nome</th>
                            <th class="px-4 py-2 text-left">Criado em</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($flags as $flag)
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-2">{{ $flag->name }}</td>
                            <td class="px-4 py-2">{{ $flag->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="px-4 py-4 text-center text-gray-500">
                                Nenhuma bandeira cadastrada para este grupo.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4 flex justify-end">
                <button wire:click="close"
                    class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg hover:cursor-pointer">
                    Fechar
                </button>
            </div>

        </div>
    </div>
    @endif
</div>