<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Admin Seeder
 *
 * Creates a default admin user for development.
 * In production, use a proper onboarding flow.
 */
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Creates a dev admin account with username/password for Nova access.
     */
    public function run(): void
    {
        // Only create if no admins exist yet
        if (Admin::count() === 0) {
            Admin::create([
                'name' => 'Rhys May',
                'email' => 'rhys@example.com',
                'password' => Hash::make('password'),
            ]);

            $this->command->info('Created default admin: rhys@example.com / password');
        }
    }
}
