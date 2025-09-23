<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LabPartNumber;

class LabPartNumberSeeder extends Seeder
{
    public function run(): void
    {
        LabPartNumber::factory()->count(40)->create();
    }
}
