<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.ru',
            'email_verified_at' => now(),
            'password' => Hash::make(321321321), // password
            'remember_token' => Str::random(10),
            'is_admin' => 1,
        ]);
    }
}
