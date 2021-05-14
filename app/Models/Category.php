<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function articles(){
        return $this->hasMany(Article::class);
    }
    use Searchable;
    public function toSearchableArray()
    {
        $array = [
            'id'=> $this->id,
            'name'=> $this->name,
        ];

        // Customize the data array...

        return $array;
    }
}
