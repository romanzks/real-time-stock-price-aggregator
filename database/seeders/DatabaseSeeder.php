<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'name' => 'Apple',
                'symbol' => 'AAPL',
            ],
            [
                'name' => 'Microsoft',
                'symbol' => 'MSFT',
            ],
            [
                'name' => 'Saudi Aramco',
                'symbol' => '2222.SR',
            ],
            [
                'name' => 'Alphabet (Google)',
                'symbol' => 'GOOG',
            ],
            [
                'name' => 'Amazon',
                'symbol' => 'AMZN',
            ],
            [
                'name' => 'NVIDIA',
                'symbol' => 'NVDA',
            ],
            [
                'name' => 'Meta Platforms (Facebook)',
                'symbol' => 'META',
            ],
            [
                'name' => 'Berkshire Hathaway',
                'symbol' => 'BRK-B',
            ],
            [
                'name' => 'Tesla',
                'symbol' => 'TSLA',
            ],
            [
                'name' => 'Eli Lilly',
                'symbol' => 'LLY',
            ],
        ]);
    }
}
