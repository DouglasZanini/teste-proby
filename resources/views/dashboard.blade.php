<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-2xl font-bold text-emerald-600 mb-4">Dashboard</h1>
            <p class="text-gray-600 mb-6">Bem-vindo, {{ Auth::user()->name }}!</p>

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Projetos Recentes</h2>
                <div class="flex gap-4">
                    <a href="{{ route('projects.index') }}"
                       class="text-white bg-emerald-500 hover:bg-emerald-600 px-4 py-2 rounded-lg text-sm shadow">
                        Ver todos
                    </a>
                    <a href="{{ route('projects.create') }}"
                       class="text-emerald-600 border border-emerald-500 hover:bg-emerald-50 px-4 py-2 rounded-lg text-sm">
                        Novo Projeto
                    </a>
                </div>
            </div>

            @if ($recentProjects->count())
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($recentProjects as $project)
                        <div class="bg-gray-100 p-4 rounded-lg shadow hover:shadow-md transition">
                            <h3 class="text-lg font-semibold text-emerald-700">{{ $project->name }}</h3>
                            <p class="text-sm text-gray-600 mt-1">
                                Status: <span class="font-medium">{{ $project->status }}</span>
                            </p>
                            <p class="text-xs text-gray-500 mt-2">Iniciado em {{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">Nenhum projeto recente encontrado.</p>
            @endif
        </div>
    </div>
</x-app-layout>
