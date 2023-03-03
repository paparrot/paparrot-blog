<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function __invoke(): View
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(3);

        return view('main.index', [
            'articles' => $articles
        ]);
    }
}
