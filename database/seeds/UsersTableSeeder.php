<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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
          'email' => 'admin@gmail.com',
          'name' => 'insan',
          'password' => bcrypt('secret'),
          'remember_token' => Str::random(10),
        ]);
    }
}
