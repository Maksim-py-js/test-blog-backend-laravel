<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticlesTags;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        $data = [];
        foreach ($articles as $article_value) {
            $comments = $article_value->comments('article_id')->get();
            $views = $article_value->views('article_id')->get();
            $likes = $article_value->likes('article_id')->get();

            $article = $article_value;

            $articles_tags = $article_value->articles_tags('article_id')->get();
            $tags_data = [];
            foreach ($articles_tags as $article_tag) {
                $tag = Tag::find($article_tag->tag_id);
                array_push($tags_data, $tag);
            }
            $tags_unique = array_unique($tags_data);
            $tags = array_values($tags_unique);

            array_push($data, compact(
                'article',
                'comments',
                'tags',
                'views',
                'likes'
            ));
        }
        return json_encode($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();

        $article->name = $request['name'];
        $article->text = $request['text'];

        $article->save();
        return $article;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article_value = Article::find($id);
        $data = [];

        $comments = $article_value->comments('article_id')->get();
        $views = $article_value->views('article_id')->get();
        $likes = $article_value->likes('article_id')->get();

        $article = $article_value;

        $articles_tags = $article_value->articles_tags('article_id')->get();
        $tags_data = [];
        foreach ($articles_tags as $articles_tag) {
            $tag = Tag::find($articles_tag->tag_id);
            array_push($tags_data, $tag);
        }
        $tags_unique = array_unique($tags_data);
        $tags = array_values($tags_unique);

        array_push($data, compact(
            'article',
            'comments',
            'tags',
            'views',
            'likes'
        ));

        return json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);

        $article->name = $request['name'];
        $article->text = $request['text'];

        $article->save();
        return $article;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        if (false != $article) {

            $article->delete();
            return "This article was deleted";
        } else {
            return "This article was deleted erlier";
        }
    }
}
