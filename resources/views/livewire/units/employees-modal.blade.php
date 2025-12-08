<div
    x-data
    @open-employees-modal.window="$wire.open($event.detail)">
    @if($showModal)
    <div class="fixed inset-0 flex items-center justify-center bg-black/50">

        <div class="bg-white dark:bg-gray-800 w-full max-w-lg rounded-lg shadow-lg p-6">

            <h2 class="text-xl font-semibold mb-4">
                Colaboradores da unidade: <span class="text-blue-600">{{ $unit->nome_fantasia }}</span>
            </h2>

            <div class="max-h-80 overflow-y-auto border rounded-lg">
                <table class="min-w-full table-auto text-sm">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-left">Nome</th>
                            <th class="px-4 py-2 text-left">Email</th>
                            <th class="px-4 py-2 text-left">CPF</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($employees as $employee)
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-2">{{ $employee->name }}</td>
                            <td class="px-4 py-2">{{ $employee->email }}</td>
                            <td class="px-4 py-2">{{ $employee->cpf }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-4 py-4 text-center text-gray-500">
                                Nenhum colaborador cadastrado para esta unidade.
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