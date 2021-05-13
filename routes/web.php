<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('homepage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//CRUD ARTICLES
Route::get('/crea/annuncio', [ArticleController::class, 'create'])->name('article.create');
Route::post('/salva/annuncio', [ArticleController::class, 'store'])->name('article.store');

Route::get('/tutti/gli/articoli/{cate?}/{articles_category?}', [ArticleController::class, 'index'])->name('article.index');
Route::get('/show/annunci/{article}', [ArticleController::class, 'show'])->name('article.show');

//contacts work with us
Route::get('/candidati', [ContactController::class, 'index'])->name('contact.index');
Route::post('/invia/candidatura', [ContactController::class, 'store'])->name('contact.store');

//revisor only
Route::get('/revisor', [RevisorController::class, 'index'])->name('revisor.index');
