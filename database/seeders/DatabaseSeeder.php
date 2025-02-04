<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Product::factory(100)->create();
        User::factory(50)->create();
        // $this->call([
            // RoleTableSeeder::class,
            // UserTableSeeder::class, 
        // ]);
    }
}
