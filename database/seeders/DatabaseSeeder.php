<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

         User::factory()->create([
             'name' => 'akram',
             'email' => 'akram@admin.com',
             'password' => bcrypt('admin@password2024')
         ]);

         $this->call(CategoriesTableSeeder::class);
        // $this->call(SubCategoriesSeeder::class);
        // $this->call(ProductsSeeder::class);
    }
}
