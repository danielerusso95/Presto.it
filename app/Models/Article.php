<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'img','category_id', 'price'];
    public function categories(){
        return $this->belongsTo(Category::class);
    }
}
