<x-app-layout>
<script>
    function openDeleteModal(projectId) {
        const form = document.getElementById('deleteForm');
        form.action = `/projects/${projectId}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-emerald-600">Todos os Projetos</h1>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('dashboard') }}"
                    class="text-emerald-600 border border-emerald-500 hover:bg-emerald-50 px-4 py-2 rounded-lg text-sm">
                        Dashboard
                    </a>
                    <a href="{{ route('projects.create') }}"
                    class="text-white bg-emerald-500 hover:bg-emerald-600 px-4 py-2 rounded-lg text-sm shadow">
                        Novo Projeto
                    </a>
                </div>
            </div>

            @if ($projects->count())
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50 text-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left">Nome</th>
                                <th class="px-4 py-3 text-left">Status</th>
                                <th class="px-4 py-3 text-left">Início</th>
                                <th class="px-4 py-3 text-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($projects as $project)
                                <tr>
                                    <td class="px-4 py-2 font-medium text-gray-900">{{ $project->nome }}</td>
                                    <td class="px-4 py-2">{{ $project->status }}</td>
                                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($project->data_inicio)->format('d/m/Y') }}</td>
                                    <td class="px-4 py-2 space-x-2">
                                         <a href="{{ route('projects.show', $project->id) }}"
                                        class="text-sm text-emerald px-3 py-1 rounded">Visualizar</a>
                                        
                                        <a href="{{ route('projects.edit', $project) }}"
                                           class="text-emerald-600 hover:underline">Editar</a>

                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                  onclick="openDeleteModal({{ $project->id }})"
                                                   class="text-red-600 hover:underline">
                                                     Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500">Nenhum projeto cadastrado ainda.</p>
            @endif
        </div>
            <div class="mt-6">
                {{ $projects->links() }}
            </div>
    </div>
    <!-- Modal de confirmação -->
<div id="deleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded shadow-lg max-w-sm w-full">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirmar Exclusão</h2>
        <p class="text-gray-600 mb-6">Tem certeza que deseja excluir este projeto?</p>

        <div class="flex justify-end space-x-3">
            <button onclick="closeDeleteModal()"
                    class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                Cancelar
            </button>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Excluir
                </button>
            </form>
        </div>
    </div>
</div>

</x-app-layout>
