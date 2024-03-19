<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::factory()->create([
            'name' => 'Clau <3',
            'user_id' => 1,
            'phone' => 99999999999
        ]);
        Contact::factory()->create([
            'name' => 'Gui <3',
            'user_id' => 2,
            'phone' => 88888888888
        ]);
    }
}
