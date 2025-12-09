<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Logs</h1>

    <div class="p-4">

        <!-- Filtros -->
        <div class="flex gap-3 mb-4">
            <input type="text" wire:model.debounce.500ms="search" placeholder="Buscar ação..." class="border rounded-lg px-3 py-2 w-full">
            <input type="text" wire:model.debounce.500ms="userFilter" placeholder="Buscar usuário..." class="border rounded-lg px-3 py-2 w-full">
            <input type="text" wire:model.debounce.500ms="modelFilter" placeholder="Buscar modelo..." class="border rounded-lg px-3 py-2 w-full">
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
                        <td class="px-4 py-3">{{ $log->description }}</td>
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