<?php

namespace Tests\Feature;

use App\Services\TodolistService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
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

    public function testSaveTodo()
    {
        $this->todolistservice->saveTodo("1", "Miftah");

        $todolist = Session::get("todolist");
        foreach ($todolist as $value) {
            self::assertEquals("1", $value['id']);
            self::assertEquals("Miftah", $value['todo']);
        }
    }

    public function testGetTodolist()
    {
        $expected = [
            [
                "id"    => "1",
                "todo"  => "Miftah"
            ],
            [
                "id"    => "2",
                "todo"  => "Gadis"
            ]
        ];

        $this->todolistservice->saveTodo("1", "Miftah");
        $this->todolistservice->saveTodo("2", "Gadis");

        self::assertEquals($expected, $this->todolistservice->getTodolist());
    }
}
