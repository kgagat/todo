<?php

namespace App\Http\Controllers;

use App\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{

    public function mainSite()
    {
        return view('home');
    }

    public function todoList()
    {

        return View('todoList');
    }

    public function getUserTodoList()
    {

        $userId = Auth::id();
        $userTodoList = TodoList::getTodoListByUserId($userId);

        return response()->json($userTodoList); // ORG
    }

    public function addTodo(Request $request)
    {

        $newTodoDescription = $request->input('newTodo');
        $userId = Auth::id();

        $this->validate($request, [
            'newTodo' => 'required|min:3',
        ]);

        $newTodoId = TodoList::addTodo($userId, $newTodoDescription);

        return response()->json([
            'id' => $newTodoId,
            'description' => $newTodoDescription,
            'done' => false
        ]);

    }

    public function toggleTodo(Request $request)
    {

        $todoId = $request->input('todoId');
        $userId = Auth::id();

        $enum = TodoList::toggle($todoId, $userId);

        return response()->json([
            'done' => $enum
        ]);

    }

    public function deleteTodo(Request $request)
    {

        $todoId = $request->input('todoId');
        $userId = Auth::id();

        TodoList::deleteTodo($userId, $todoId);

        return response()->json(
            true
        );

    }
}
