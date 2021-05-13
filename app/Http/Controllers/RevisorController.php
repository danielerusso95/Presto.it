<?php

namespace App\Http\Controllers;


use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.revisor');
    }

    public function index()
    {
        $article = Article::where('is_accepted', null)->orderBy('created_at', 'asc')->first();

        return view('revisor.index', compact('article'));
    }

}
