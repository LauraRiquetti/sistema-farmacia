<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class, // O seu de admin que já estava aí
            ProdutoSeeder::class,   // Adicionamos o novo aqui!
        ]);
    }
}