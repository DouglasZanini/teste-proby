<x-app-layout>
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
                                            <button type="submit"
                                                    class="text-red-500 hover:underline"
                                                    onclick="return confirm('Tem certeza que deseja excluir este projeto?')">
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
</x-app-layout>
