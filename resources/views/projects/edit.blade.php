<x-app-layout>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<script>
    function openEditModal() {
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>

    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-4">Editar Projeto</h2>

        <form id="editProjectForm" method="POST" action="{{ route('projects.update', $project->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="nome" id="nome" required value="{{ $project->nome }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200" />
                    @error('nome')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
            </div>

            <div>
                <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                <textarea name="descricao" id="descricao" rows="4"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200">{{ $project->descricao }}</textarea>
            </div>

            <div>
                <label for="data_inicio" class="block text-sm font-medium text-gray-700">Data de Início</label>
                <input type="date" name="data_inicio" id="data_inicio" required value="{{ $project->data_inicio }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200" />
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200">
                    <option value="Pendente" {{ $project->status == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                    <option value="Em Andamento" {{ $project->status == 'Em Andamento' ? 'selected' : '' }}>Em Andamento</option>
                    <option value="Concluído" {{ $project->status == 'Concluído' ? 'selected' : '' }}>Concluído</option>
                </select>
            </div>

            <div>
                <!-- Botão que abre o modal de confirmação -->
                <button type="button"
                        onclick="openEditModal()"
                        class="bg-emerald-600 text-white px-4 py-2 rounded hover:bg-emerald-700">
                    Salvar Alterações
                </button>
                <a href="{{ route('projects') }}" class="ml-2 text-gray-600 hover:underline">Cancelar</a>
            </div>
        </form>
    </div>
    <!-- Modal de confirmação de edição -->
<div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded shadow-lg max-w-sm w-full">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirmar Edição</h2>
        <p class="text-gray-600 mb-6">Tem certeza que deseja salvar as alterações deste projeto?</p>

        <div class="flex justify-end space-x-3">
            <button type="button"
                    onclick="closeEditModal()"
                    class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                Cancelar
            </button>
            <button type="submit"
                    form="editProjectForm"
                    class="px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700">
                Confirmar
            </button>
        </div>
    </div>
</div>
</x-app-layout>