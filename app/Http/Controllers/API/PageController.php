<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\JsonResponse;

class PageController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $pages = Page::all();

        return response()->json($pages);
    }

    /**
     * @param Page $page
     * @return JsonResponse
     */
    public function show(Page $page): JsonResponse
    {
        return response()->json($page);
    }
}
