<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home() {
        $images = $this->getImages();
        return view('homepage',compact('images'));
    }
}
