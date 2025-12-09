<div class="p-6">
    <h1 class="text-2xl font-bold mb-7">Dashboard de Métricas</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <!-- Employees -->
        <div class="p-4 rounded-xl border bg-white dark:bg-gray-800 dark:border-gray-700">
            <h3 class="text-lg font-semibold mb-2">Funcionários</h3>
            <p class="text-3xl font-bold">{{ $metrics['employees']['total'] }}</p>
            <p class="text-sm text-green-600 mt-1">
                +{{ $metrics['employees']['last_30_days'] }} nos últimos 30 dias
            </p>
        </div>

        <!-- Units -->
        <div class="p-4 rounded-xl border bg-white dark:bg-gray-800 dark:border-gray-700">
            <h3 class="text-lg font-semibold mb-2">Unidades</h3>
            <p class="text-3xl font-bold">{{ $metrics['units']['total'] }}</p>
            <p class="text-sm text-green-600 mt-1">
                +{{ $metrics['units']['last_30_days'] }} nos últimos 30 dias
            </p>
        </div>

        <!-- Economic Groups -->
        <div class="p-4 rounded-xl border bg-white dark:bg-gray-800 dark:border-gray-700">
            <h3 class="text-lg font-semibold mb-2">Grupos Econômicos</h3>
            <p class="text-3xl font-bold">{{ $metrics['economic_groups']['total'] }}</p>
            <p class="text-sm text-green-600 mt-1">
                +{{ $metrics['economic_groups']['last_30_days'] }} nos últimos 30 dias
            </p>
        </div>

    </div>

    <div class="mt-4 p-6 rounded-xl border bg-white dark:bg-gray-800 dark:border-gray-700">
        <h3 class="text-lg font-semibold mb-4">Outras Estatísticas</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-3 border rounded-xl dark:border-gray-700">
                <p class="text-sm text-neutral-500">Total de Bandeiras</p>
                <p class="text-xl font-bold">{{ $metrics['flags']['total'] }}</p>
            </div>

            <div class="p-3 border rounded-xl dark:border-gray-700">
                <p class="text-sm text-neutral-500">Bandeiras criadas (30 dias)</p>
                <p class="text-xl font-bold text-green-600">
                    +{{ $metrics['flags']['last_30_days'] }}
                </p>
            </div>
        </div>
    </div>
</div>