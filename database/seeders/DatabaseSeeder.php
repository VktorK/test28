<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            "title" => 'admin'
        ]);

        Role::create([
            "title" => 'user'
        ]);

        User::withoutEvents(function () {
                User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => Hash::make('123123123'),
            ]);
        });

        User::find(1)->roles()->sync([
            'role_id' => 1,
            'user_id' => 1,
        ]);

        User::factory(10)->create();
        CarBrand::factory(10)->create();
        CarModel::factory(10)->create();
        Car::factory(10)->create();
    }
}
