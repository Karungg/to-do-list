<?php

namespace Tests\Feature;

use App\Services\TodolistService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistServiceTest extends TestCase
{
    private TodolistService $todolistservice;

    public function setUp(): void
    {
        parent::setUp();

        $this->todolistservice = $this->app->make(TodolistService::class);
    }

    public function testTodolistNotNull()
    {
        self::assertNotNull($this->todolistservice);
    }
}
