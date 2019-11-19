<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $arrayRole_id = Role::pluck('id')->toArray();
        for ($i = 0; $i < 15; $i++) {
            User::insert([
                'name' => $faker->sentence(3),
                'email' => $faker->email,
                'password' => $faker->password,
                'role_id' => array_random($arrayRole_id),
                'remember_token'=> $faker->sentence(3)
                ]);
        }
    }
}
