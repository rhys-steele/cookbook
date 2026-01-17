<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * Seeds admin user for Nova access, then recipe data.
     */
    public function run(): void
    {
        // Create admin user for Nova
        $this->call(AdminSeeder::class);

        // We'll add recipe seeding later via the seed:recipes command
    }
}
