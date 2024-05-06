<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Funcionário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <h2 class="text-lg font-semibold mb-4">Editar Funcionário</h2>
                    <form method="POST" action="{{ route('employee.update', $employee->id) }}" class="max-w-lg">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome:</label>
                            <input type="text" id="name" name="name" value="{{ $employee->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="document" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Documento:</label>
                            <input type="text" id="document" name="document" value="{{ $employee->document }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Função:</label>
                            <select id="role" name="role" onchange="toggleOtherField()" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="Guarda" @if($employee->role == 'Guarda') selected @endif>Guarda</option>
                                <option value="Cozinheiro" @if($employee->role == 'Cozinheiro') selected @endif>Cozinheiro</option>
                                <option value="Zelador" @if($employee->role == 'Zelador') selected @endif>Zelador</option>
                                <option value="Outro" @if($employee->role == 'Outro') selected @endif>Outro</option>
                            </select>
                        </div>
                        <div class="mb-4" id="otherRoleField" style="@if($employee->role !== 'Outro') display: none; @endif">
                            <label for="otherRole" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Especifique:</label>
                            <input type="text" id="otherRole" name="otherRole" value="{{ $employee->role === 'Outro' ? $employee->other : '' }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="salary" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Salário:</label>
                            <input type="number" id="salary" name="salary" value="{{ $employee->salary }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="date_admission" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data de Admissão:</label>
                            <input type="date" id="date_admission" name="date_admission" value="{{ $employee->date_admission }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <a href="{{ route('employee.management') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancelar</a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Salvar Alterações</button>
                    
                        <x-danger-button
                                class="flex justify-end"
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-employee-deletion')"
                                >{{ __('Deletar Funcionário') }}
                        </x-danger-button>
                        <section>
                    <x-modal name="confirm-employee-deletion" :show="$errors->employeeDeletion->isNotEmpty()" focusable>
                        <form method="post" action="{{ route('employee.destroy', ['employee' => $employee]) }}" class="p-6">
                            @csrf
                            @method('delete')

                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Tem certeza que deseja deletar este cadastro?') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Uma vez deletado, todos os recursos e dados serão apagador! Por favor, insira sua senha para confirmar.') }}
                            </p>

                            <div class="mt-6">
                                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                                <x-text-input
                                    id="password"
                                    name="password"
                                    type="password"
                                    class="mt-1 block w-3/4"
                                    placeholder="{{ __('Password') }}"
                                />

                                <x-input-error :messages="$errors->employeeDeletion->get('password')" class="mt-2" />
                            </div>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancelar') }}
                                </x-secondary-button>

                                <x-danger-button class="ms-3">
                                    {{ __('Deletar') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>
                </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        toggleOtherField();
    });

    function toggleOtherField() {
        var roleSelect = document.getElementById('role');
        var otherRoleField = document.getElementById('otherRoleField');

        if (roleSelect.value === 'Outro') {
            otherRoleField.style.display = 'block';
        } else {
            otherRoleField.style.display = 'none';
        }
    }
</script>
