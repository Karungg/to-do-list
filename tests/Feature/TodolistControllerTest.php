<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
    public function testTodolist()
    {
        $this->withSession(
            [
                "user"  => "Miftah"
            ],
            [
                [
                    "id"    => "1",
                    "todo"  => "Miftah"
                ],
                [
                    "id"    => "2",
                    "todo"  => "Fadilah"
                ]
            ]
        );

        $this->get('/todolist')
            ->assertSeeText("1")
            ->assertSeeText("Miftah")
            ->assertSeeText("2")
            ->assertSeeText("Fadilah");
    }
}
