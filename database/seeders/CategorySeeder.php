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
        Category::craete([
            'name' => 'un-categorized',
            'status' => 1,
        ]);

        Category::craete([
            'name' => 'Swimming',
            'status' => 1,
        ]);

        Category::craete([
            'name' => 'Football',
            'status' => 1,
        ]);

        Category::craete([
            'name' => 'Karate',
            'status' => 1,
        ]);

        Category::craete([
            'name' => 'Basket Ball',
            'status' => 1,
        ]);
    }
}
