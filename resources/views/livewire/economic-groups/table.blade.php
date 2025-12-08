<div class="overflow-x-auto bg-white shadow rounded-lg dark:bg-gray-800 dark:text-gray-200">
    <table class="min-w-full table-auto">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-2 text-left">Criado em</th>
                <th class="px-4 py-2 text-left">Nome</th>
                <th class="px-4 py-2 text-left">Bandeiras</th>
                <th class="px-4 py-2 text-right">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($economicGroups as $group)
            <tr class="border-b dark:border-gray-700">
                <td class="px-4 py-3">{{ $group->created_at->format('d/m/Y \à\s H:i') }}</td>
                <td class="px-4 py-3">{{ $group->name }}</td>
                <td class="px-4 py-3">{{ $group->flags->count() }}</td>
                <td class="px-4 py-3 text-right space-x-3">
                    <button
                        wire:click="$dispatch('edit-group', { id: {{ $group->id }} })"
                        class="text-blue-600 hover:text-blue-800 transition hover:cursor-pointer">
                        <x-flux::icon name="pencil" class="w-5 h-5" />
                    </button>

                    <button
                        wire:click="$dispatch('open-delete-modal', { id: {{ $group->id }}, modelClass: 'App\\Models\\EconomicGroup' })"
                        class="text-red-600 hover:text-red-800 transition hover:cursor-pointer">
                        <x-flux::icon name="trash" class="w-5 h-5" />
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>