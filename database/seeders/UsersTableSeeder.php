<?php

namespace Database\Seeders;

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
			'name' => 'Admin',
            'email' => 'admin@admin.com​',
            'password' => bcrypt('password'),
			'is_permission' => 1
        ]);
        \DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
        ]);
    }
}
