<?php

namespace App;

use App\Article;
use Illuminate\Support\Facades\Storage;

class Channel
{
    public $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function articles()
    {
        return collect(Storage::allFiles("articles/{$this->slug}"))
            ->mapInto(Article::class);
    }
}
