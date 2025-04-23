<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $recentProjects = Project::orderBy('created_at', 'desc')->take(6)->get();

        return view('dashboard', compact('recentProjects'));
    }
}
