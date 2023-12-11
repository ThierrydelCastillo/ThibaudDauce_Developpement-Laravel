<?php

namespace App;
use Illuminate\Support\Facades\Storage;
use Mni\FrontYAML\Parser;

class Article
{
    public $path;
    public $document;
    public function __construct($path)
    {
        $this->path = $path;
        $this->document = (new Parser)->parse(Storage::get($path));
    }

    public function title()
    {
        return $this->document->getYAML()['title'];
    }

    public function youtube()
    {
        return $this->document->getYAML()['youtube'];
    }
    public function url()
    {
        return url(str_replace('.md', '.html', $this->path));
    }

    public function html()
    {
        return $this->document->getContent();
    }
}
