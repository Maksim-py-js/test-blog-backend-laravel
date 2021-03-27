<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('articles', 'App\Http\Controllers\ArticlesController');
Route::apiResource('comments', 'App\Http\Controllers\CommentsController');
Route::apiResource('tags', 'App\Http\Controllers\TagsController');

Route::apiResource('articles_tags', 'App\Http\Controllers\ArticlesTagsController');

Route::apiResource('views', 'App\Http\Controllers\ViewsController');
Route::apiResource('likes', 'App\Http\Controllers\LikesController');
