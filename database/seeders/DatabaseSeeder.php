<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);

        $this->call([EventSeeder::class, RoleSeeder::class]);
    }
}
