<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed genders
        \App\Models\Gender::factory()->create([
            'gender' => 'Male'
        ]);

        \App\Models\Gender::factory()->create([
            'gender' => 'Female'
        ]);

        // Seed roles
        \App\Models\Role::factory()->create([
            'role' => 'Admin'
        ]);

        \App\Models\Role::factory()->create([
            'role' => 'Manager'
        ]);

        \App\Models\Role::factory()->create([
            'role' => 'Cashier'
        ]);

        // Seed users
        User::factory()->create([
            'first_name' => 'Kezia',
            'middle_name' => null,
            'last_name' => 'Dolor',
            'suffix_name' => null,
            'birth_date' => '2024-08-26',
            'gender_id' => 2,
            'address' => 'Roxas City',
            'contact_number' => '123456789',
            'email_address' => 'kezia@gmail.com',
            'role_id' => 1, 
            'username' => 'admin',
            'password' => bcrypt('123')
        ]);

        Supplier::factory()->create([
            'supplier' => 'Supplier One',
            'address' => '123 Supplier One Street',
            'contact_number' => '1234567890',
            'email_address' => 'supplier1@gmail.com',
        ]);

        Supplier::factory()->create([
            'supplier' => 'Supplier Two',
            'address' => 'Seoul Korea',
            'contact_number' => '0912343210',
            'email_address' => 'skorea@gmail.com',
        ]);

        // Seed products
        Product::factory()->create([
            'product_name' => 'Reputation',
            'artist' => 'Taylor Swift',
            'genre' => 'Pop',
            'release_date' => '2017-11-10',
            'price' => '1000',
            'stock' => '13',
            'supplier_id' => 1, 
        ]);
    }
}
