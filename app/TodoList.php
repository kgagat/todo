<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $table = 'todo_list';
    public $timestamps = false;

    static function getTodoListByUserId($userId)
    {
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
        if ($actualEnum == 'no') {
            $actualTodo->done = 'yes';
        } else {
            $actualTodo->done = 'no';
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