<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User',3)->create()->each(function($user){
            for($i=0;$i<15;$i++)
            {
                $book = $user->books()->create(factory('App\Book')->make()->toArray());
                $book->categories()->attach([rand(1,9),rand(1,9),rand(1,9)]);
                $book->authors()->attach([rand(1,9),rand(1,9)]);
            }
        });
    }
}
