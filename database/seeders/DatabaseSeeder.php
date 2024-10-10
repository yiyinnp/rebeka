<?php

namespace Database\Seeders;

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
        \App\Models\User::create([
            'name' => 'Yiyin Noriyah Putri',
            'email' => 'yiyin19202@gmail.com',
            'level' => 'siswa',
            'password' => bcrypt('12345'),
        ]);
        \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'yiyinnoriyahp@gmail.com',
            'level' => 'guru',
            'password' => bcrypt('123456')
        ]);
        
    }
}
