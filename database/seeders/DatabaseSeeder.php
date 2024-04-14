<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'username' => 'Admin Perpustakaan',
            'password' => bcrypt('admin123'),
            'email' => 'admin@gmail.com',
            'role' => "Admin",
            'alamat' => 'SMk Wikrama Bogor'
        ]);
    }
}
