<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'link', 'pub_date', 'published_at', 'description', 'content', 'slug', 'author', 'category', 'image', 'tag'
    ];
}
