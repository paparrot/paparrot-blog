<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', MainController::class)
    ->name('home');
Route::get('/blog', [ArticleController::class, 'index'])
    ->name('articles.list');
Route::get('/blog/{article:slug}', [ArticleController::class, 'show'])
    ->name('articles.show');
Route::get('/projects', [ProjectController::class, 'index'])
    ->name('projects.list');
Route::get('/projects/{project:slug}', [ProjectController::class, 'index'])
    ->name('projects.show');
Route::get('/contacts', [ContactsController::class, 'index'])
    ->name('contacts.index');
Route::post('/contacts', [ContactsController::class, 'submit'])
    ->name('contacts.submit');
Route::get('/{page:slug}', [PageController::class, 'show']);

