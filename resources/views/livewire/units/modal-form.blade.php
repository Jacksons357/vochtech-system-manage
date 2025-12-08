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
            {{ $editingId ? 'Editar Unidade' : 'Nova Unidade' }}
        </h2>

        <div class="space-y-2 mb-4">
            <div>
                <label class="block text-gray-700 dark:text-gray-300 mb-1" for="nome_fantasia">Nome Fantasia</label>
                <input type="text" wire:model.defer="nome_fantasia"
                    id="nome_fantasia"
                    class="border rounded-lg w-full px-3 py-2"
                    placeholder="Informe o nome fantasia da unidade">
                @error('nome_fantasia')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-300 mb-1" for="razao_social">Razão Social</label>
                <input type="text" wire:model.defer="razao_social"
                    id="razao_social"
                    class="border rounded-lg w-full px-3 py-2"
                    placeholder="Informe a razão social da unidade">
                @error('razao_social')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div x-data="{ cnpj: @entangle('cnpj') }">
                <label class="block text-gray-700 dark:text-gray-300 mb-1" for="cnpj">CNPJ</label>
                <input type="text"
                    id="cnpj"
                    x-model="cnpj"
                    @input="cnpj = cnpj.replace(/\D/g,'')
                        .replace(/^(\d{2})(\d)/,'$1.$2')
                        .replace(/^(\d{2})\.(\d{3})(\d)/,'$1.$2.$3')
                        .replace(/\.(\d{3})(\d)/,'.$1/$2')
                        .replace(/(\d{4})(\d)/,'$1-$2')
                        .slice(0,18)"
                    placeholder="00.000.000/0000-00"
                    class="border rounded-lg w-full px-3 py-2">
                @error('cnpj')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-300 mb-1" for="flag_id">Bandeira</label>
                <select wire:model.defer="flag_id" id="flag_id" class="border rounded-lg w-full px-3 py-2 bg-white dark:bg-gray-800 dark:text-gray-200
                w-full max-w-md rounded-lg shadow-lg p-6">
                    <option value="">Selecione...</option>
                    @foreach($flags as $flag)
                    <option value="{{ $flag->id }}">{{ $flag->name }}</option>
                    @endforeach
                </select>
                @error('flag_id')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
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