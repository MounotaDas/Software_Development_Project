<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ResultCalculated;

class ResultCalculatedSeeder extends Seeder
{
    public function run(): void
    {
        ResultCalculated::factory()->count(40)->create();
    }
}
