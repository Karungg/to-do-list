<?php

namespace App\Http\Controllers;

use App\Services\TodolistService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodolistController extends Controller
{

    private TodolistService $todolistservice;

    public function __construct(TodolistService $todolistService)
    {
        $this->todolistservice = $todolistService;
    }

    public function todolist(Request $request): Response
    {
        $todolist = $this->todolistservice->getTodolist();

        return response()->view('todolist.todolist', [
            'title' => "Todolist",
            'todo'  => $todolist,
        ]);
    }

    public function addTodo(Request $request): RedirectResponse
    {
        $todo = $request->input('todo');

        if (empty($todo)) {
            $todolist = $this->todolistservice->getTodolist();
            return response()->view('todolist.todolist', [
                'title' => "Todolist",
                'todo'  => $todolist,
                'error' => "Todo is required"

            ]);
        }

        return redirect()->action([TodolistController::class, 'todolist']);
    }

    public function removeTodo(Request $request)
    {
    }
}
