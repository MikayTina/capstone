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
        //
        DB::table('users')->insert([            
            'fname' =>'Mikay',
            'lname' => 'Tinapay',
            'username' => 'michaela.camson@gmail.com',
            'password' => Hash::make('password'),
            'contact' => '09219211972',
            'email' => 'michaela.camson@gmail.com',
            'role' => '1',
            'department' => '1',
            'remember_token' => str_random(10),
        ]);
    }
}
