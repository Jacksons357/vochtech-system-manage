<div
    x-data
    @open-units-modal.window="$wire.open($event.detail)">
    @if($showModal)
    <div class="fixed inset-0 flex items-center justify-center bg-black/50">

        <div class="bg-white dark:bg-gray-800 w-full max-w-lg rounded-lg shadow-lg p-6">

            <h2 class="text-xl font-semibold mb-4">
                Unidades da bandeira: <span class="text-blue-600">{{ $flag->name }}</span>
            </h2>

            <div class="max-h-80 overflow-y-auto border rounded-lg">
                <table class="min-w-full table-auto text-sm">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-left">Nome Fantasia</th>
                            <th class="px-4 py-2 text-left">Razão Social</th>
                            <th class="px-4 py-2 text-left">CNPJ</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($units as $unit)
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-2">{{ $unit->nome_fantasia }}</td>
                            <td class="px-4 py-2">{{ $unit->razao_social }}</td>
                            <td class="px-4 py-2">{{ $unit->cnpj }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-4 py-4 text-center text-gray-500">
                                Nenhuma unidade cadastrada para esta bandeira.
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