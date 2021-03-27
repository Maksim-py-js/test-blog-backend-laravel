<?php

namespace App\Http\Controllers;

use App\Models\ArticlesTags;
use Illuminate\Http\Request;

class ArticlesTagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles_tags = ArticlesTags::all();
        return $articles_tags;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article_tag = new ArticlesTags();

        $article_tag->article_id = $request['article_id'];
        $article_tag->tag_id = $request['tag_id'];

        $article_tag->save();
        return $article_tag;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article_tag = ArticlesTags::find($id);
        return $article_tag;
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
        $article_tag = ArticlesTags::find($id);

        $article_tag->article_id = $request['article_id'];
        $article_tag->tag_id = $request['tag_id'];

        $article_tag->save();
        return $article_tag;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article_tag = ArticlesTags::find($id);

        if (false != $article_tag) {

            $article_tag->delete();
            return "This article_tag was deleted";
        } else {
            return "This article_tag was deleted erlier";
        }
    }
}
