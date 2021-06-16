<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i<20; $i++){
            // Istanza
            $new_post = new Post();



            // Popolazione

            $new_post->title =$faker->text(50);
            $new_post->slug = Str::slug($new_post->title,'-');
            $new_post->content = $faker->paragraphs(3, true);
            $new_post->date = $faker->datetime();




            // Salvataggio
            $new_post->save();

        }
    }
}
