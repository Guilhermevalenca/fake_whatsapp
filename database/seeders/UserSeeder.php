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
            'status' => 'Eu sou biruta',
            'phone' => '88888888888',
            'email_verified_at' => now(),
            'password' => 'ipi123'
        ]);
        User::factory()->create([
            'name' => 'Claudiane Rodrigues',
            'email' => 'cra@gmail.com',
            'status' => 'Estou louca',
            'phone' => '99999999999',
            'email_verified_at' => now(),
            'password' => 'ipi123'
        ]);
        User::factory()->create([
            'name' => 'Other user 1',
            'email' => 'user1@gmail.com',
            'phone' => '66666666666',
            'email_verified_at' => now(),
            'password' => 'ipi123'
        ]);
        User::factory()->create([
            'name' => 'Other user 2',
            'email' => 'user2@gmail.com',
            'phone' => '66666666667',
            'email_verified_at' => now(),
            'password' => 'ipi123'
        ]);
        User::factory()->create([
            'name' => 'Other user 3',
            'email' => 'user3@gmail.com',
            'phone' => '66666666668',
            'email_verified_at' => now(),
            'password' => 'ipi123'
        ]);
    }
}
