<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Searchable;
    use HasFactory;
    protected $fillable = ['title', 'body','category_id', 'price', 'user_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    static public function notifyArticlesForRevisor(){
        return Article::where('is_accepted', null)->count();
    }


    public function toSearchableArray()
    {
        $articles = "";
        $array = [
            'id'=> $this->id,
            'title'=> $this->title,
            'body'=> $this->body,
            'articoli'=> $articles
        ];

        // Customize the data array...

        return $array;
    }
}
