<div class="overflow-x-auto bg-white shadow rounded-lg dark:bg-gray-800 dark:text-gray-200">
    <table class="min-w-full table-auto">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-2 text-left">
                    Criado em
                </th>
                <th class="px-4 py-2 text-left">
                    Nome Fantasia
                </th>
                <th class="px-4 py-2 text-left">
                    Razão Social
                </th>
                <th class="px-4 py-2 text-left">
                    CNPJ
                </th>
                <th class="px-4 py-2 text-left">
                    Bandeira
                </th>
                <th class="px-4 py-2 text-left">
                    Colaboradores
                </th>
                <th class="px-4 py-2 text-right">
                    Ações
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach($units as $unit)
            <tr class="border-b dark:border-gray-700">
                <td class="px-4 py-3">
                    {{ $unit->created_at->setTimezone('America/Sao_Paulo')->format('d/m/Y \à\s H:i') }}
                </td>

                <td class="px-4 py-3">
                    {{ $unit->nome_fantasia }}
                </td>

                <td class="px-4 py-3">
                    {{ $unit->razao_social }}
                </td>

                <td class="px-4 py-3">
                    {{ $unit->cnpj }}
                </td>

                <td class="px-4 py-3">
                    {{ $unit->flag->name }}
                </td>

                <td class="px-4 py-3">
                    <span class="mr-2">{{ $unit->employees->count() }}</span>
                    @if($unit->employees->count() > 0)
                    <button
                        wire:click="$dispatch('open-flags-modal', { id: {{ $unit->id }} })"
                        @click="console.log('clicou no botão do grupo {{ $unit->id }}')"
                        class="hover:cursor-pointer text-gray-600 hover:text-gray-500 transition flex items-center gap-1 border border-gray-500/20 px-2 rounded-lg">
                        Visualizar
                        <x-flux::icon name="eye" class="w-5 h-5" />
                    </button>
                    @endif
                </td>

                <td class="px-4 py-3 text-right space-x-3">
                    <button
                        wire:click=" $dispatch('edit-unit', { id: {{ $unit->id }} })"
                        class="text-blue-600 hover:text-blue-800 transition hover:cursor-pointer">
                        <x-flux::icon name="pencil" class="w-5 h-5" />
                    </button>

                    <button
                        wire:click="$dispatch('open-delete-modal', { id: {{ $unit->id }}, modelClass: 'App\\Models\\Unit' })"
                        class="text-red-600 hover:text-red-800 transition hover:cursor-pointer">
                        <x-flux::icon name="trash" class="w-5 h-5" />
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>