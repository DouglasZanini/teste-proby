<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userId = auth()->id(); // ID do usuário logado

        // Buscando os projetos recentes do usuário
        $recentProjects = Project::where('user_id', $userId)
                                ->latest()
                                ->take(3)
                                ->get();

        return view('dashboard', compact('recentProjects'));
    }
}
