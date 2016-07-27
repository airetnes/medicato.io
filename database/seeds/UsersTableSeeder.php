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
        DB::table('users')->insert([
            'id' => 1,
            'enabled' => 1,
            'first_name' => 'Никита',
            'middle_name' => 'Александрович',
            'last_name' => 'Новиков',
            'phone' => '+79134372545',
            'email' => 'hukutuk35@gmail.com',
            'password' => bcrypt('123123'),
            'role_id' => 100,
            'sex' => 1,
        ]);
        factory(\App\User::class, 20)->create();
    }
}
