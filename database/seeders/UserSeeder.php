<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Guilherme Valença',
            'email' => 'gui@gmail.com',
            'email_verified_at' => now(),
            'password' => 'ipi123'
        ]);
        User::factory()->create([
            'name' => 'Claudiane Rodrigues',
            'email' => 'cra@gmail.com',
            'email_verified_at' => now(),
            'password' => 'ipi123'
        ]);
    }
}
