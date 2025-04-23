<x-app-layout>
    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-4">Editar Projeto</h2>

        <form method="POST" action="{{ route('projects.update', $project->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="nome" id="nome" required value="{{ $project->nome }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200" />
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
                <button type="submit"
                    class="bg-emerald-600 text-white px-4 py-2 rounded hover:bg-emerald-700">Salvar Alterações</button>
                <a href="{{ route('dashboard') }}" class="ml-2 text-gray-600 hover:underline">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>