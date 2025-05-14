<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $projects = Project::where('user_id', auth()->id())
                       ->latest()
                       ->paginate(10);

    return view('projects.index', compact('projects'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',      
            'data_inicio' => 'required|date',
            'status' => 'required|in:Pendente,Em Andamento,Concluído',
        ]);
    
        $validated['user_id'] = auth()->id();

        Project::create($validated);
    
        return redirect()->route('dashboard')->with('success', 'Projeto criado com sucesso!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $project = Project::where('id', $id)
                          ->where('user_id', auth()->id())
                          ->firstOrFail();
    
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $project = Project::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|',      
            'data_inicio' => 'required|date',
            'status' => 'required|in:Pendente,Em Andamento,Concluído',
        ],  [
            'nome.max' => 'O nome do projeto deve ter no máximo 255 caracteres.',
        ]);

        $project = Project::findOrFail($id);
        $project->update($validated);
        return redirect()->route('projects.index')->with('success', 'Projeto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $project = Project::findOrFail($id);
    
        $project->delete(); 
    
        return redirect()->route('projects.index')->with('success', 'Projeto excluído com sucesso!');
    }
    
}
