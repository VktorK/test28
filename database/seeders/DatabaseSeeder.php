<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::factory(10)->create();
        CarBrand::factory(10)->create();
        CarModel::factory(10)->create();
        Car::factory(10)->create();

        Role::create([
            "title" => 'admin'
        ]);

        Role::create([
            "title" => 'user'
        ]);


         User::factory()->create([
             'name' => 'Test User',
             'email' => '4you.19885@mail.ru',
             'password' => Hash::make('123456'),
         ]);
    }
}
