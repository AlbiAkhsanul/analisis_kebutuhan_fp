<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama_pengguna' => 'Admin',
                'password' => Hash::make('password123'),
                'email' => 'admin@example.com',
                'jobdesk' => 'Administrator',
                'is_admin' => 1,
                'foto_pengguna' => 'userImages/anomali.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'nama_pengguna' => 'Regular',
                'password' => Hash::make('userpassword'),
                'email' => 'user@example.com',
                'jobdesk' => 'Stakeholder',
                'is_admin' => 0,
                'foto_pengguna' => 'userImages/manInSuit.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ]
        ]);
    }
}
