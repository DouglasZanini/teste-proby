<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Pega os 6 projetos mais recentes
        $recentProjects = Project::orderBy('created_at', 'desc')->take(6)->get();

        return view('dashboard', compact('recentProjects'));
    }
}
