<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('user_types')->insert([
            'title' => 'Root',
        ]);

        DB::table('user_types')->insert([
            'title' => 'Administrador',
        ]);

        DB::table('user_types')->insert([
            'title' => 'Assistente de conteúdo',
        ]);

        DB::table('users')->insert([
            'name' => 'Dev',
            'type_id' => 1,
            'email' => 'dev@email.com',
            'password' => Hash::make('12345678'),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'type_id' => 2,
            'email' => 'admin@email.com',
            'password' => Hash::make('12345678'),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('content_types')->insert([
            'title' => 'Artigo',
        ]);

        DB::table('content_types')->insert([
            'title' => 'Notícia',
        ]);

        DB::table('content_types')->insert([
            'title' => 'Documentação',
        ]);
    }
}
