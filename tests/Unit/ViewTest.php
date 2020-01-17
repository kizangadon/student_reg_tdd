<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewTest extends TestCase
{
    /**
     * @test
     */
    public function testViewDummy(){
        $this->withoutExceptionHandling();
        $response = $this->get('/test');

        $response->assertViewIs('test');
        $response->assertSeeText('this is the test page');
    }
}
