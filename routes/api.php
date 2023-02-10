<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('articles', ArticleController::class)
    ->only(['show', 'index']);

Route::resource('categories', CategoryController::class)
    ->only(['show', 'index']);

Route::resource('pages', PageController::class)
    ->only(['show', 'index']);
