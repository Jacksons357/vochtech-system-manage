<div
    x-data="{ open: @entangle('showModal') }"
    x-show="open"
    x-transition
    class="fixed inset-0 flex items-center justify-center bg-black/50"
    style="display:none;">
    @if($showModal)
    <div class="bg-white dark:bg-gray-800 dark:text-gray-200
                w-full max-w-md rounded-lg shadow-lg p-6">

        <h2 class="text-xl font-semibold mb-4">
            {{ $editingId ? 'Editar Funcionário' : 'Novo Funcionário' }}
        </h2>

        <div class="space-y-2 mb-4">
            <div>
                <label class="block text-gray-700 dark:text-gray-300 mb-1" for="name">Nome</label>
                <input type="text" wire:model.defer="name"
                    id="name"
                    class="border rounded-lg w-full px-3 py-2"
                    placeholder="Informe o nome do funcionário">
                @error('name')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-300 mb-1" for="email">Email</label>
                <input type="email" wire:model.defer="email"
                    id="email"
                    class="border rounded-lg w-full px-3 py-2"
                    placeholder="email@exemplo.com">
                @error('email')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div x-data="{ cpf: @entangle('cpf') }">
                <label class="block text-gray-700 dark:text-gray-300 mb-1" for="cpf">CPF</label>
                <input type="text"
                    id="cpf"
                    x-model="cpf"
                    @input="
                        cpf = cpf
                            .replace(/\D/g, '')
                            .slice(0, 11)
                            .replace(/(\d{3})(\d)/, '$1.$2')
                            .replace(/(\d{3})\.(\d{3})(\d)/, '$1.$2.$3')
                            .replace(/(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4');
                        "
                    placeholder="000.000.000-00"
                    class="border rounded-lg w-full px-3 py-2">
                @error('cpf')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-300 mb-1" for="unit_id">Unidade</label>
                <select wire:model.defer="unit_id" id="unit_id" class="border rounded-lg w-full px-3 py-2 bg-white dark:bg-gray-800 dark:text-gray-200
                w-full max-w-md rounded-lg shadow-lg p-6">
                    <option value="">Selecione...</option>
                    @foreach($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->nome_fantasia }}</option>
                    @endforeach
                </select>
                @error('unit_id')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="flex justify-end space-x-2">
            <button @click="open=false" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg
                        dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-200 hover:cursor-pointer">
                Cancelar
            </button>
            <button wire:click="save" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg hover:cursor-pointer">
                Salvar
            </button>
        </div>

    </div>
    @endif
</div>