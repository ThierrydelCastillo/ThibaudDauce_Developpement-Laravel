<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomepageTest extends TestCase
{
    /** @test */
    function it_shows_the_homepage()
    {
        //permet d'afficher les erreurs dans le retour PHPunit
        //$this->withoutExceptionHandling(); 
        
        $this->get('/')
            ->assertSuccessful()
            ->assertViewIs('homepage.index'); // équivalant à 'homepage/index'
    }
}
