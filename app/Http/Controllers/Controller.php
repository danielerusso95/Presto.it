<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function getImages()
    {
        $images = ['https://picsum.photos/', 'https://picsum.photos/', 'https://picsum.photos/', 'https://picsum.photos/', 'https://picsum.photos/'];
        return $images;
    }
}


