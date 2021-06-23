<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Front End',
            'Back End',
            'Design',
            'UX',
            'Laravel',
        ];

        //loop
        foreach ($tags as $tag) {

            // Istanza

            $new_tag = new Tag();
            
            // Popolazione 

            $new_tag->name = $tag;
            $new_tag->slug = Str::slug($tag, '-');


            // Salvataggio

            $new_tag->save();
        }
    }
}
