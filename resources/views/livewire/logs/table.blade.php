<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Logs</h1>

    <div class="p-4">

        <!-- Filtros -->
        <div class="flex gap-3 mb-4">
            <select wire:model.defer="search" class="border rounded-lg w-full px-3 py-2 bg-transparent dark:bg-transparent dark:text-gray-300
                w-full max-w-md rounded-lg shadow-lg p-6">
                <option value="">Todas ações</option>
                <option value="created">Criado</option>
                <option value="updated">Atualizado</option>
                <option value="deleted">Deletado</option>
            </select>

            <input type="text" wire:model.defer="userFilter"
                wire:keydown.enter="$refresh"
                placeholder="Buscar usuário..."
                class="border rounded-lg px-3 py-2 w-full">

            <select wire:model.defer="modelFilter" class="border rounded-lg w-full px-3 py-2 bg-transparent dark:bg-transparent dark:text-gray-300
                w-full max-w-md rounded-lg shadow-lg p-6">
                <option value="">Todos os modelos</option>
                @foreach($models as $model)
                <option value="{{ $model }}">{{ $model }}</option>
                @endforeach
            </select>

            <!-- Botão filtrar -->
            <button wire:click="$refresh"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg hover:cursor-pointer">
                Filtrar
            </button>

            <!-- Botão limpar -->
            <button wire:click="clearFilters"
                class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg hover:cursor-pointer">
                Limpar
            </button>
        </div>

        <!-- Tabela de logs -->
        <div class="overflow-x-auto bg-white shadow rounded-lg dark:bg-gray-800 dark:text-gray-200">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left">Usuário</th>
                        <th class="px-4 py-2 text-left">Ação</th>
                        <th class="px-4 py-2 text-left">Modelo</th>
                        <th class="px-4 py-2 text-left">Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                    <tr class="border-b dark:border-gray-700">
                        <td class="px-4 py-3">{{ $log->causer?->name ?? 'Sistema' }}</td>
                        <td class="px-4 py-3">
                            @php
                            $colors = [
                            'created' => 'bg-blue-100 text-blue-800',
                            'updated' => 'bg-yellow-100 text-yellow-800',
                            'deleted' => 'bg-red-100 text-red-800',
                            ];
                            @endphp
                            <span class="px-2 py-1 rounded {{ $colors[$log->event] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ ucfirst($log->event) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">{{ class_basename($log->subject_type) }}</td>
                        <td class="px-4 py-3">{{ $log->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="my-4 px-4">
                {{ $logs->links() }}
            </div>
        </div>
    </div>
</div>