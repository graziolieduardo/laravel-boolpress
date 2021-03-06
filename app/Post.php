<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'author', 'slug', 'category_id'];

    public function tag() {
        return $this->belongsToMany('App\Tag');
    }

    protected function category() {
        return $this->belongsTo('App\Category');
    }
}
