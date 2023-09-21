<?php

namespace Database\Seeders;

use App\Models\Catagory;
use App\Models\Category;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 4 categories using the CategoryFactory
        Category::factory(4)->create();
    }
}
