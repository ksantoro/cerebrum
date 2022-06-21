<?php

namespace Tests\Feature;

use App\Models\Example;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexPage()
    {
        Example::factory()->count(2)->create();

        $example_1 = Example::find(1);
        $example_2 = Example::find(2);

        $response = $this->get('/example');

        $response->assertSeeText($example_1->code);
        $response->assertSeeText($example_2->code);
    }

    public function testShowPage()
    {
        Example::factory()->create();

        $example = Example::first();
        $response = $this->get("/example/{$example->id}");

        $response->assertSeeText($example->code);
        $response->assertSeeText($example->description);
    }
}
