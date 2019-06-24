<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class DataSampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	for ($i=0; $i < 20; $i++) {
            DB::table('datasensor')->insert([
                'waktu' => Carbon::now()->addSeconds($i),
                'level' => rand(0,8),
                'ip' => '192.168.1.11'
            ]);
        }

        for ($j=0; $j < 20; $j++) {
            DB::table('datasensor')->insert([
                'waktu' => Carbon::now()->addSeconds($j),
                'level' => rand(0,8),
                'ip' => '192.168.1.12'
            ]);
        }

        for ($k=0; $k < 20; $k++) {
            DB::table('datasensor')->insert([
                'waktu' => Carbon::now()->addSeconds($k),
                'level' => rand(0,8),
                'ip' => '192.168.1.13'
            ]);
        }

        for ($k=0; $k < 20; $k++) {
            DB::table('datasensor')->insert([
                'waktu' => Carbon::now()->addSeconds($k),
                'level' => rand(0,8),
                'ip' => '192.168.1.14'
            ]);
        }

        for ($k=0; $k < 20; $k++) {
            DB::table('datasensor')->insert([
                'waktu' => Carbon::now()->addSeconds($k),
                'level' => rand(0,8),
                'ip' => '192.168.1.15'
            ]);
        }

        for ($k=0; $k < 20; $k++) {
            DB::table('datasensor')->insert([
                'waktu' => Carbon::now()->addSeconds($k),
                'level' => rand(0,8),
                'ip' => '192.168.1.16'
            ]);
        }

        for ($k=0; $k < 20; $k++) {
            DB::table('datasensor')->insert([
                'waktu' => Carbon::now()->addSeconds($k),
                'level' => rand(0,8),
                'ip' => '192.168.1.17'
            ]);
        }

        for ($i=0; $i < 20; $i++) {
            DB::table('datasensor')->insert([
                'waktu' => Carbon::now()->addSeconds($i),
                'level' => rand(0,8),
                'ip' => '192.168.1.21'
            ]);
        }

        for ($j=0; $j < 20; $j++) {
            DB::table('datasensor')->insert([
                'waktu' => Carbon::now()->addSeconds($j),
                'level' => rand(0,8),
                'ip' => '192.168.1.22'
            ]);
        }

        for ($k=0; $k < 20; $k++) {
            DB::table('datasensor')->insert([
                'waktu' => Carbon::now()->addSeconds($k),
                'level' => rand(0,8),
                'ip' => '192.168.1.23'
            ]);
        }

        for ($k=0; $k < 20; $k++) {
            DB::table('datasensor')->insert([
                'waktu' => Carbon::now()->addSeconds($k),
                'level' => rand(0,8),
                'ip' => '192.168.1.24'
            ]);
        }

        for ($k=0; $k < 20; $k++) {
            DB::table('datasensor')->insert([
                'waktu' => Carbon::now()->addSeconds($k),
                'level' => rand(0,8),
                'ip' => '192.168.1.25'
            ]);
        }

        for ($k=0; $k < 20; $k++) {
            DB::table('datasensor')->insert([
                'waktu' => Carbon::now()->addSeconds($k),
                'level' => rand(0,8),
                'ip' => '192.168.1.26'
            ]);
        }

        for ($k=0; $k < 20; $k++) {
            DB::table('datasensor')->insert([
                'waktu' => Carbon::now()->addSeconds($k),
                'level' => rand(0,8),
                'ip' => '192.168.1.27'
            ]);
        }

        for ($k=0; $k < 20; $k++) {
            DB::table('datasensor')->insert([
                'waktu' => Carbon::now()->addSeconds($k),
                'level' => rand(0,8),
                'ip' => '192.168.1.31'
            ]);
        }

        for ($k=0; $k < 20; $k++) {
            DB::table('datasensor')->insert([
                'waktu' => Carbon::now()->addSeconds($k),
                'level' => rand(0,8),
                'ip' => '192.168.1.41'
            ]);
        }

        DB::table('databatasan')->insert([
          'normal' => '4',
          'bahaya' => '7'
        ]);

    }
}
