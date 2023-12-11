<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChannelsController extends Controller
{
    public function show($channel)
    {
        $parser = new \Mni\FrontYAML\Parser;
        $files = Storage::allFiles("articles/{$channel}");
        $articles = [];
       
        foreach($files as $file) {
            $content = Storage::get($file);

            $document = $parser->parse($content);

            $yaml = $document->getYAML();

            $articles[] = [
                'title' => $yaml['title'],
                'youtube' => $yaml['youtube'],
                'url' => url(str_replace('.md', '.html', $file)),
            ];
        }

        return view('channels.show', [
            'articles' => $articles,
        ]);
    }
}
