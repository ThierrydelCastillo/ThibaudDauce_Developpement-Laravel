<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    public function show($channelSlug, $articleSlug)
    {
        $article = new Article("articles/$channelSlug/$articleSlug.md");

        return view('articles.show', [
            'article' => $article,
        ]);
    }
}
