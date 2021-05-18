<?php

namespace App\Http\Controllers;

use App\Jobs\ResizeImage;
use App\Models\Article;
use App\Models\ArticleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $revisedArticles=Article::where('is_accepted', true)->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(6);
        $articles=Article::where('is_accepted', null)->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(6);

        return view('user.index', compact('articles', 'revisedArticles'));
    }

    public function edit(Article $article, Request $request)
    {
        $uniqueSecret = $request->old('uniqueSecret',base_convert(sha1(uniqid(mt_rand())), 16, 36));
        return view('user.article_edit', compact('article','uniqueSecret'));
        
    }
    

    public function update(Request $request, Article $article)
    {
        $article->update([
            'title'=> $request->title,
            'body'=> $request->body,
            'price'=> $request->price
        ]);
        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);

        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

        $images = array_diff($images,$removedImages);

        foreach ($images as $image) {
            $fileName = basename($image);
            $newFileName = "public/articles/{$article->id}/{$fileName}";
            Storage::move($image,$newFileName);
            
            dispatch(new ResizeImage(
                $newFileName,
                200,
                200
            ));
            dispatch(new ResizeImage(
                $newFileName,
                500,
                500
            ));

            $i = ArticleImage::create([
                'file'=> $newFileName,
                'article_id'=> $article->id,
            ]);
        }

        Storage::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

        return redirect(route('user.index'))->with('message', 'Annuncio modificato!');
    }

    public function delete(Article $article)
    {
        $article->delete();
        return redirect(route('user.index'))->with('message', 'Annuncio eliminato!');
    }

    public function deleteImage($image)
    {
        $deleteImage = ArticleImage::where('id',$image)->get();
        $deleteImage->all()[0]->delete();
        return redirect()->back()->with('message', 'Immagine eliminata!');
    }

    //viste userArticles
}

