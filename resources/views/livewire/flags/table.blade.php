<div class="overflow-x-auto bg-white shadow rounded-lg dark:bg-gray-800 dark:text-gray-200">
    <table class="min-w-full table-auto">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-2 text-left">
                    Criado em
                </th>
                <th class="px-4 py-2 text-left">
                    Nome
                </th>
                <th class="px-4 py-2 text-left">
                    Grupo Econômico
                </th>
                <th class="px-4 py-2 text-right">
                    Ações
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach($flags as $flag)
            <tr class="border-b dark:border-gray-700">
                <td class="px-4 py-3">
                    {{ $flag->created_at->setTimezone('America/Sao_Paulo')->format('d/m/Y \à\s H:i') }}
                </td>

                <td class="px-4 py-3">
                    {{ $flag->name }}
                </td>

                <td class="px-4 py-3">
                    {{ $flag->economicGroup->name }}
                </td>

                <td class="px-4 py-3 text-right space-x-3">
                    <button
                        wire:click=" $dispatch('edit-flag', { id: {{ $flag->id }} })"
                        class="text-blue-600 hover:text-blue-800 transition hover:cursor-pointer">
                        <x-flux::icon name="pencil" class="w-5 h-5" />
                    </button>

                    <button
                        wire:click="$dispatch('open-delete-modal', { id: {{ $flag->id }}, modelClass: 'App\\Models\\Flag' })"
                        class="text-red-600 hover:text-red-800 transition hover:cursor-pointer">
                        <x-flux::icon name="trash" class="w-5 h-5" />
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>