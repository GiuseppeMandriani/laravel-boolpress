<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creazione Categories

        $categories = [
            'HTML',
            'CSS',
            'JavaScript',
            'PHP'
        ];

        foreach ($categories as $category){
            // Creazione istanza
            $new_category = new Category();

            // Popolazione 
            $new_category->name = $category;
            $new_category->slug = Str::slug($category, '-');

            // Salvataggio
            $new_category->save();
        }
    }
}
