<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function panel(){
        return view('user.panel');
    }
    public function userArticles(){

        $images = $this->getImages();
        $revisedArticles=Article::where('is_accepted', true)->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(6);
        $articles=Article::where('is_accepted', null)->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(6);

        return view('user.index', compact('articles', 'images', 'revisedArticles'));
    }

    public function edit(Article $article)
    {
        return view('user.article_edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $article->update([
            'title'=> $request->title,
            'body'=> $request->body,
            'price'=> $request->price
        ]);
        return redirect()->back()->with('message', 'Annuncio modificato!');
    }

    public function delete(Article $article)
    {
        $article->delete();
        return redirect(route('user.index'))->with('message', 'Annuncio eliminato!');
    }
}
