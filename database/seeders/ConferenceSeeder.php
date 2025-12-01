<?php

namespace Database\Seeders;

use App\Models\Conference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Conference::factory()->create([
            'title' => 'Vilnius Tech Career day',
            'description' => 'Annual conference about modern career options in technology',
            'date' => '2026-01-10',
            'address' => 'Sauletekio al. 10',
            'city' => 'Vilnius',
            'country' => 'Lithuania',
            'participantCount' => 210,
        ]);

        Conference::factory()->create([
            'title' => 'Unicorn Summit',
            'description' => 'Networking event for startup founders and investors',
            'date' => '2026-01-16',
            'address' => 'Boksto g. 12',
            'city' => 'Kaunas',
            'country' => 'Lithuania',
            'participantCount' => 323,
        ]);
    }
}
