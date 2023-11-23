<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    public function show($channel, $slug)
    {
        $content = Storage::get("articles/{$channel}/{$slug}.md");

        $parser = new \Mni\FrontYAML\Parser;

        $document = $parser->parse($content);

        $yaml = $document->getYAML();
        $html = $document->getContent();

        return view('articles.show', [
            'title' => $yaml['title'],
            'youtube' => $yaml['youtube'],
            'content' => $html,
        ]);
    }
}
