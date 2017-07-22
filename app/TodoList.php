<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $table = 'todo_list';
    public $timestamps = false;

    static function getTodoListByUserId($userId)
    {
        // [
        //  { done: "true", .... }
        // ]

        return self::select('id', 'description', 'done')->where('user_id', $userId)->get();
    }

    static function addTodo($userId, $description)
    {

        $newTodo = new TodoList();
        $newTodo->description = $description;
        $newTodo->user_id = $userId;
        $newTodo->save();

        return $newTodo->id;
    }

    static function toggle($todoId, $userId)
    {

        $actualTodo = self::where('id', $todoId)
            ->where('user_id', $userId)
            ->first();

        $actualEnum = $actualTodo->done;
        if ($actualEnum == false) {
            $actualTodo->done = true;
        } else {
            $actualTodo->done = false;
        }
        $actualTodo->save();

        return $actualTodo->done;

    }

    static function deleteTodo ($userId, $todoId){

        self::where('user_id', $userId)
            ->where('id', $todoId)
            ->delete();

    }

}