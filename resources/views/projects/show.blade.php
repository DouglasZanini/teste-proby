<x-app-layout>
    <div class="max-w-3xl mx-auto py-10">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-4 text-emerald-700">{{ $project->nome }}</h2>

            <p class="text-gray-700 mb-2"><strong>Descrição:</strong> {{ $project->descricao ?? 'Sem descrição.' }}</p>
            <p class="text-gray-700 mb-2"><strong>Data de Início:</strong> {{ \Carbon\Carbon::parse($project->data_inicio)->format('d/m/Y') }}</p>
            <p class="text-gray-700 mb-2"><strong>Status:</strong> {{ $project->status }}</p>

            <div class="mt-6">
                <a href="{{ route('projects.index') }}" class="text-emerald-600 hover:underline">← Voltar para projetos</a>
            </div>
        </div>
    </div>
</x-app-layout>
