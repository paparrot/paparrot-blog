<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate();

        return view('main.projects.index', [
            'projects' => $projects
        ]);
    }

    public function show(Project $project): View
    {
        return view('main.projects.show', [
            'project' => $project
        ]);
    }
}
