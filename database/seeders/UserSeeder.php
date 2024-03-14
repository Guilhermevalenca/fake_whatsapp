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
            'phone' => '81994139948',
            'email_verified_at' => now(),
            'password' => 'ipi123'
        ]);
        User::factory()->create([
            'name' => 'Claudiane Rodrigues',
            'email' => 'cra@gmail.com',
            'phone' => '819941399482',
            'email_verified_at' => now(),
            'password' => 'ipi123'
        ]);
    }
}
