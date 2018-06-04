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
    	factory(\App\User::class)->create([
    		'name' => 'Cristyan Valera',
    		'email' => 'cristyan12@mail.com',
    		'password' => bcrypt('123456'),
    	]);

        factory(\App\User::class, 9)->create();
    }
}
