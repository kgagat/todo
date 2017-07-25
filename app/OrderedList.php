<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedList extends Model
{
    protected $table = 'todo_order_list';
    public $timestamps = false;

    static function getOrderedListByUserId($userId)
    {
        $orderedList = self::select('ordered_list')->where('user_id', $userId)->first();
        return explode(',', $orderedList->ordered_list);
    }

    static function deleteTodos($userId, $todoId)
    {

        $todosOrdered = self::getOrderedListByUserId($userId);
        $key = array_search($todoId, $todosOrdered);

        unset($todosOrdered[$key]);

        $string = implode(',', $todosOrdered);

        self::where('user_id', $userId)
            ->update(['ordered_list'=> $string]);

    }

    static function addOrderedTodo ($userId, $newTodoId){

        $orderedList = self::getOrderedListByUserId($userId);
        array_unshift($orderedList, $newTodoId);
        $string = implode(',', $orderedList);

        self::where('user_id', $userId)
            ->update(['ordered_list'=> $string]);

    }
}
