<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use App\Models\User;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        ProductCategory::create([
            'name' => 'Backpack',
            'slug' => 'backpack',
        ]);
        ProductCategory::create([
            'name' => 'Tent',
            'slug' => 'tent',
        ]);
        ProductCategory::create([
            'name' => 'Other Equipment',
            'slug' => 'other-equipment',
        ]);

        Product::create([
            'name' => 'Test',
            'image' => '',
            'description' => 'Test',
            'price' => 1,
            'stock' => 1,
            'category_id' => 2
        ]);
    }
}
