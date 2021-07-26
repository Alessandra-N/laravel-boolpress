<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'image', 'content', 'category_id'];

    public function category()
    {
        return $this->belongsTo(User::class);
    }
}