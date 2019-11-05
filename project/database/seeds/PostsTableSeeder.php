<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Post;
use App\User;
class PostsTableSeeder extends Seeder
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
        $arrayCategory_id= Category::pluck('id')->toArray();
        for ($i = 0 ; $i<10; $i++) {
            Post::insert(['title'=>$faker->sentence(random_int(3,5)),'description'=> $faker->sentence(6),
            'content'=>$faker->sentence(15), 'category_id'=>array_random($arrayCategory_id),
                'user_id'=>array_random($arrayUser_id)]);
        }
    }
}
