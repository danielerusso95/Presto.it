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
        $this->middleware('auth')->except(['show','index','search_results']);

        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(6);
        View::share('articles',$articles);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $cate)
    {

        $images = $this->getImages();
        $articles_category =Article::where('is_accepted', true)->where('category_id',$cate->id)->orderBy('created_at', 'desc')->paginate(6);
        $category = $cate;
        return view ('article.index', compact('category','articles_category', 'images'));
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
        $categories = Category::all();
        $category_name="";
        foreach ($categories as $category) {
            if($category->id == $request->category){
                $category_name = $category->name;
            }
        }
        $article = Article::create([
            'title'=> $request->title,
            'body'=> $request->body,
            'category_id'=>$request->category,
            'category_name'=>$category_name,
            'price'=>$request->price,
            'user_id'=>Auth::id()

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
        $images = $this->getImages();
        return view('article.show', compact('article', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
   
    public function search(Request $request){
        $q = $request->input('q');
        $articles = Article::search($q)->where('is_accepted', true)->paginate(6);

            $images = $this->getImages();
            return view('search.search_results', compact('q', 'articles', 'images'));

    }

}
