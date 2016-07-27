<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Пользователь'
        ]);
        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'Специалист'
        ]);
        DB::table('roles')->insert([
            'id' => 100,
            'name' => 'Администратор'
        ]);
    }
}
