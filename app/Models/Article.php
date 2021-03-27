<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function comments() {
        return $this->hasMany('App\Models\Comment', 'article_id');
    }
    public function tags() {
        return $this->belongsTo('App\Models\Tag', 'tag_id');
    }
    public function articles_tags() {
        return $this->hasMany('App\Models\ArticlesTags', 'article_id');
    }
    public function views() {
        return $this->hasMany('App\Models\View', 'article_id');
    }
    public function likes() {
        return $this->hasMany('App\Models\Like', 'article_id');
    }
}
