<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('users')->insert([
            'name' => 'Ania',
            'email' => 'anna.kitowicz@gmail.com',
            'password' => 'test'
        ]);

        DB::table('users')->insert([
            'name' => 'Kacper',
            'email' => 'mail@gmail.com',
            'password' => 'test'
        ]);
    }
}
