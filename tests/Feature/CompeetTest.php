<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompeetTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_routePost(): void
    {
        $response = $this->post('/api/compeet', ['competitor' => 2, 'competition' => 4, 'car' => 3, 'arrives_at' => '2025-06-20 10:20:30', 'start_date' => '2025-06-20 11:22:33', 'finish_date' => '2025-06-20 12:23:34']);

        $response->assertStatus(201);
    }
}
