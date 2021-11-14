<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now=Carbon\Carbon::now();
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password' => Hash::make('admin123'),
            'created_at'=>$now
        ]);
    }
}
