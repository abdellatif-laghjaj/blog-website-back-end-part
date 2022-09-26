<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::get()->each(function (Category $category) {
            Article::factory()->count(5)->create([
                'category_id' => $category->id,
            ]);
        });
    }
}
