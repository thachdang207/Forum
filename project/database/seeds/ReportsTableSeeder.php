<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Report;
use App\User;
class ReportsTableSeeder extends Seeder
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
            Report::insert(['content'=>$faker->sentence(10), 'user_id'=>array_random($arrayUser_id),
                'post_id'=>array_random($arrayPost_id)]);
        }
    }
}
