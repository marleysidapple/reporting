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
         \DB::table('users')->insert([
            'name' => 'Operator',
            'email' => 'operator@mail.com',
            'phone' => '12345678',
            'password' => \bcrypt('password'),
        ]);

         \DB::table('role_user')->insert(['user_id' => '1', 'role_id' => '1']);
    }
}
