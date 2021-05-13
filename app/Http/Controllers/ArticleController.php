<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Image;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show','index']);

        $articles = Article::orderByDesc('created_at')->paginate(6);
        View::share('articles',$articles);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $cate)
    {
        $articles_category = $cate->articles()->paginate(6);
        $category = $cate;
        return view ('article.index', compact('category','articles_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = Article::create([
            'title'=> $request->title,
            'body'=> $request->body,
            'category_id'=>$request->category,
            'price'=>$request->price,
            'user_id'=>Auth::id()

        ]);
        $image = Image::create([
            'img1'=> 'https://picsum.photos/',
            'img2'=> 'https://via.placeholder.com/',
            'img3'=> 'https://picsum.photos/',
            'img4'=> 'https://via.placeholder.com/',
            'img5'=> 'https://picsum.photos/',
            'article_id'=> $article->id
        ]);
        return redirect()->back()->with('message','Complimenti, annuncio creato con successo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
    
}
