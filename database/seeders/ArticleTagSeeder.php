<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ArticlesTags;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            $article_tag = new ArticlesTags();

            $article_tag->article_id = $i;
            $article_tag->tag_id = $i;
            $article_tag->save();

            $article_tag = new ArticlesTags();

            $article_tag->article_id = $i++;
            $article_tag->tag_id = $i++;
            $article_tag->save();

            $article_tag = new ArticlesTags();

            $article_tag->article_id = $i--;
            $article_tag->tag_id = $i--;
            $article_tag->save();
        }
    }
}
