<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$vUIzDlvfpu2yOATsPYcPaOTY/zgbgwViLIWSfZxSlmRBFV.g/fmOW',
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Zeya',
                'email'          => 'zeya@findmytelu.com',
                'password'       => '$2y$10$90upR65OokdEGmHs1CkbbeQkEhEPa2XGrUcxxRMPR4Uh2.onMBKGe',
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Zahwa',
                'email'          => 'zahwa@findmytelu.com',
                'password'       => '$2y$10$yB3DuURElXrsDOnpG7R6oeMvoRcQ1jf0AQ8vpRNlB7ePia5dOP1JO',
                'remember_token' => null, 
            ],
            [
                'id'             => 4,
                'name'           => 'Daffa',
                'email'          => 'daffa@findmytelu.com',
                'password'       => '$2y$10$MTdns3d1ak3p7bUp4FVbWu2lc2NeoDl4oaIn8n/PnTmvpK6RVWKiu',
                'remember_token' => null, 
            ],
            [
                'id'             => 5,
                'name'           => 'Deus',
                'email'          => 'deus@findmytelu.com',
                'password'       => '$2y$10$e7VMQjzwxChVTuxirfAl6etnTUxoPse00g/6eW.y1FFz0yjOOeuHq',
                'remember_token' => null, 
            ],
            [
                'id'             => 6,
                'name'           => 'Satrio',
                'email'          => 'satrio@findmytelu.com',
                'password'       => '$2y$10$Tu7YGrAnUCY0eGsAZkaZbeZ2TWEb6tZxad8XAARttPFjcFrJhBTwm',
                'remember_token' => null, 
            ],
        ];

        User::insert($users);

        foreach(range(6,10) as $id)
        {
            User::create([
                'name' => $faker->unique()->name,
                'email' => "user$id@user$id.com",
                'password' => bcrypt('password'),
            ]);
        }
    }
}
