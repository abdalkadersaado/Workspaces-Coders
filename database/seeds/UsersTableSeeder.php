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
        factory('App\User')->create([

        	'name' => 'administrator',
        	'username' => 'admin',
        	'email'=> 'admin@gmail.com',
        	'gender' => 'male', //password : secret
            'admin' => true,
            'avatar'=> 'http://127.0.0.1:8000/imgs/avatars/default-male.png'


        ]);

        factory('App\User')->create([

        	'name' => 'user',
        	'username' => 'user',
        	'email'=> 'user@gmail.com',
        	'gender' => 'male',
            'admin' => false,
            'avatar'=> 'http://127.0.0.1:8000/imgs/avatars/default-male.png'


        ]);
        
    }
}
