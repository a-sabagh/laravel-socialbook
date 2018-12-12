<?php

use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Author',10)->create()->each(function($author){
            echo "{$author->name} is created successfully \n";
        });
    }
}
