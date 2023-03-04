<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(Request $request): View
    {
        $query = Article::orderBy('created_at', 'desc');

        if ($request->has('category')) {
            $query = $query->whereRelation('category', 'slug', '=', $request->get('category'));
        }

        $articles = $query->paginate();

        return view('main.blog.index', [
            'articles' => $articles
        ]);
    }

    public function show(Article $article): View
    {
        return view('main.blog.show', [
           'article' => $article
        ]);
    }
}
