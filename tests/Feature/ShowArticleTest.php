<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;

class ShowArticleTest extends TestCase
{
    /** @test */
    function it_show_an_article_with_a_YouTube_video()
    {
        
        $this->withoutExceptionHandling(); // Affiche les erreurs dans le retour de PHPUnit
        Storage::fake('local');

        $content = <<<EOT
---
title: My title
youtube: https://www.youtube.com/embed/abcde
---

**very important**

EOT;
        Storage::put('articles/decouverte/2018-01-01-test.md', $content);
        
        // ETAPE ACTION : QUE FAIT LE VISITEUR
        $this->get('articles/decouverte/2018-01-01-test.html')
            ->assertSuccessful()
            ->assertSee('My title')
            ->assertSee('src="https://www.youtube.com/embed/abcde"')
            ->assertSee('<strong>very important</strong>');

        // ETAPE VERIFICATION
    }
}
