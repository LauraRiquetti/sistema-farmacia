<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'adm@email.com',
            'password' => Hash::make('1234'),
            'role' => 'admin'
        ]);
    }
}
