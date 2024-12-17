<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'admin_id' => 1,
                'username' => 'admin',
                'password' => Hash::make('admin123'), 
                'created_at' => now(),
                'updated_at' => now(),
            ]]);
    }
}
