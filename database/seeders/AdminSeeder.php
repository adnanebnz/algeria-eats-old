<?php

namespace Database\Seeders;

use App\Models\Admin;
use Database\Factories\AdminFactory;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{

    public function run(): void
    {
        Admin::factory()->create();
    }
}
