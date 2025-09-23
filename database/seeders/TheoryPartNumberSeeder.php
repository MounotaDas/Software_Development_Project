<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TheoryPartNumber;

class TheoryPartNumberSeeder extends Seeder
{
    public function run(): void
    {
        TheoryPartNumber::factory()->count(40)->create();
    }
}
