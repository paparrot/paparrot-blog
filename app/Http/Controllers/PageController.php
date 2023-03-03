<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;

class PageController extends Controller
{
    public function show(Page $page): View
    {
        if (! $page->exists) {
            return view('/');
        }

        return view("main.page", [
            'page' => $page
        ]);
    }
}
