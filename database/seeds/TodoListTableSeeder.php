<?php

use Illuminate\Database\Seeder;

class TodoListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('todo_list')->truncate();
//        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        DB::table('todo_list')->insert([[
                'description' => 'Zrobic zadanie z todo list',
                'user_id' => 1,
            ], [
                'description' => 'Postarac sie mocno',
                'user_id' => 1,
            ], [
                'description' => 'Bardzo mocnot',
                'user_id' => 1,
            ]]
        );
    }
}
