<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Enterprise',
            'email' => 'enterprise@enterprise.com',
            'phone' => '017',
            'password' => Hash::make('12345678'),
            'user_type' => 'enterprise',
        ]);
        User::factory()->create([
            'name' => 'Tecnician',
            'email' => 'individual@individual.com',
            'phone' => '018',
            'password' => Hash::make('12345678'),
            'user_type' => 'individual',
        ]);

        $this->call(SystemSettingSeeder::class);
        $this->call([RoleSeeder::class]);
        // $this->call([WaterParameterSeeder::class]);
    }
}
