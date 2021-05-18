<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home() {
        return view('homepage');
    }
    
    public function locale($locale){
        session()->put('locale', $locale);
        return redirect()->back();
    }

    // vista home
}
