<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home() {
        $images = $this->getImages();
        return view('homepage',compact('images'));
    }
    public function locale($locale){
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
