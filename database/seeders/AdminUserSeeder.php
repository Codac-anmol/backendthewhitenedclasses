<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Creates the first admin login.
     * Change the email/password below (or override with env vars) before seeding in production.
     *
     * Run with: php artisan db:seed --class=AdminUserSeeder
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@thewhitenedclasses.com')],
            [
                'name' => 'Admin',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'ChangeMe123!')),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
