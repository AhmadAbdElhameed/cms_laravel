<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'un-categorized',
            'status' => 1,
        ]);

        Category::create([
            'name' => 'Swimming',
            'status' => 1,
        ]);

        Category::create([
            'name' => 'Football',
            'status' => 1,
        ]);

        Category::create([
            'name' => 'Karate',
            'status' => 1,
        ]);

        Category::create([
            'name' => 'Basket Ball',
            'status' => 1,
        ]);
    }
}
