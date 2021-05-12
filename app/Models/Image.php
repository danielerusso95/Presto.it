<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['img1','img2','img3','img4','img5','article_id'];
    use HasFactory;
    public function article(){
        return $this->belongsTo(Article::class);
    }
}
