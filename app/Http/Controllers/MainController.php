<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Project;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function __invoke(): View
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(3);
        $projects = Project::orderBy('created_at', 'desc')->paginate(4);

        return view('main.index', [
            'articles' => $articles,
            'projects' => $projects,
        ]);
    }
}
