<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredientCategories = [
            "Leafy Greens" => ["Spinach", "Kale", "Lettuce", "Swiss chard", "Collard greens"],
            "Cruciferous Vegetables" => ["Broccoli", "Cauliflower", "Brussels sprouts", "Cabbage"],
            "Root Vegetables" => ["Carrots", "Potatoes", "Sweet potatoes", "Beets", "Radishes"],
            "Allium Vegetables" => ["Onions", "Garlic", "Leeks", "Shallots", "Chives"],
            "Gourd and Squash Vegetables" => ["Zucchini", "Butternut squash", "Acorn squash", "Pumpkin", "Cucumber"],
            "Nightshade Vegetables" => ["Tomatoes", "Bell peppers", "Eggplant"],
            "Podded Vegetables" => ["Peas", "Green beans", "Snap peas", "Edamame"],
            "Stalk and Stem Vegetables" => ["Asparagus", "Celery", "Rhubarb", "Bamboo shoots"],
            "Tubers" => ["Cassava", "Yams"],
            "Miscellaneous Vegetables" => ["Artichokes", "Avocado", "Mushrooms", "Okra"],
        ];

        foreach ($ingredientCategories as $categoryName => $ingredients) {
            $category = \App\Models\ProductCategory::create([
                'name' => $categoryName,
                'slug' => \Illuminate\Support\Str::slug($categoryName),
            ]);

            foreach ($ingredients as $ingredientName) {
                \App\Models\ProductCategory::create([
                    'name' => $ingredientName,
                    'slug' => \Illuminate\Support\Str::slug($ingredientName),
                    'parent_id' => $category->id,
                ]);
            }
        }
    }
}
