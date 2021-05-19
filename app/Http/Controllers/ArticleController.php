<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\ArticleImage;
use Illuminate\Http\Request;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ArticleRequest;
use App\Jobs\GoogleVisionRemoveFaces;
use Intervention\Image\Facades\Image;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;

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

        $articles_category =Article::where('is_accepted', true)->where('category_id',$cate->id)->orderBy('created_at', 'desc')->paginate(6);
        $category = $cate;
        return view ('article.index', compact('category','articles_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $uniqueSecret = $request->old('uniqueSecret',base_convert(sha1(uniqid(mt_rand())), 16, 36));
        return view ('article.create',compact('uniqueSecret'));
    }

    public function uploadImages(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        ));

        session()->push("images.{$uniqueSecret}", $fileName);

        return response()->json(
            [
                'id' => $fileName
            ]
        );
    }

    public function removeImages(Request $request){

        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->input('id');
        session()->push("removedimages.{$uniqueSecret}",$fileName);
        Storage::delete($fileName);
        return response()->json('ok');
    }

    public function oldImages(Request $request){

        $uniqueSecret = $request->input('uniqueSecret');
        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);
        $images = array_diff($images,$removedImages);
        $data = [];
        foreach ($images as $image) {
            $data[]=[
                'id'=>$image,
                'src'=>ArticleImage::getUrlByFilePath($image, 120, 120)
            ];
        }

        return response()->json($data);
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

        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);

        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

        $images = array_diff($images,$removedImages);

        foreach ($images as $image) {
            $fileName = basename($image);
            $newFileName = "public/articles/{$article->id}/{$fileName}";
            Storage::move($image,$newFileName);

            $i = ArticleImage::create([
                'file'=> $newFileName,
                'article_id'=> $article->id,
            ]);

            GoogleVisionSafeSearchImage::withChain(
                [new GoogleVisionLabelImage($i->id), 
                new GoogleVisionRemoveFaces($i->id),
                new ResizeImage(
                    $newFileName,
                    200,
                    200
                ),
                new ResizeImage(
                    $newFileName,
                    500,
                    500
                )
                ])->dispatch($i->id);
        }

        Storage::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

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


        return view('search.search_results', compact('q', 'articles'));

    }

    //vista search, index, show
}
