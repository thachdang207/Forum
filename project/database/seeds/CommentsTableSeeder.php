<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;
use App\User;
class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker\Factory::create();
        $arrayUser_id= User::pluck('id')->toArray();
        $arrayPost_id= Post::pluck('id')->toArray();
        for ($i = 0 ; $i<10; $i++) {
            Comment::insert(['content'=>$faker->sentence(15), 'user_id'=>array_random($arrayUser_id),
                'post_id'=>array_random($arrayPost_id)]);
        }
    }
}
