<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowArticlesListTest extends TestCase
{
    /** @test */
    function it_show_a_list_articles()
    {
        
        $this->withoutExceptionHandling(); // Affiche les erreurs dans le retour de PHPUnit
        Storage::fake('local');

        $content = <<<EOT
---
title: My first title
youtube: https://www.youtube.com/embed/first
---

**very important**

EOT;
        Storage::put('articles/decouverte/2018-01-01-test-1.md', $content);

        $content = <<<EOT
---
title: My second title
youtube: https://www.youtube.com/embed/second
---

**very important**

EOT;
        Storage::put('articles/decouverte/2018-01-01-test-2.md', $content);

        $this->get('articles/decouverte')
            ->assertSuccessful()
            ->assertSee('My first title')
            ->assertSee('My second title')
            ->assertSee('src="https://www.youtube.com/embed/first"')
            ->assertSee('src="https://www.youtube.com/embed/second"')
            ->assertSee(url("articles/decouverte/2018-01-01-test-1.html"))
            ->assertSee(url("articles/decouverte/2018-01-01-test-2.html"));
    }
        
    /** @test */
    function it_return_a_404_when_channel_does_not_exist()
    {
        $this->get('articles/unknow')
                ->assertStatus(404);
    }
}
