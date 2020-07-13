<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Studio::class, 5)->create();

        factory(App\Actor::class, 25)->create();

        factory(App\Category::class, 5)->create();

        factory(App\Tag::class, 100)->make()->each(function ($tag) {
            if(random_int(0, 3) === 0) {
                $category = App\Category::find(random_int(1, 5));
                $tag->category()->associate($category);
            }
            $tag->save();
        });

        factory(App\Movie::class, 25)->make()->each(function ($movie) {
            $studio = App\Studio::find(random_int(1, 5));
            $movie->studio()->associate($studio);
            $movie->save();

            // 3 to 10 tags
            $number_tags = random_int(3, 10);
            $tags_id = [];

            for ($i=0; $i < $number_tags; $i++) {
                $new_id = random_int(1, 100);
                if(!in_array($new_id, $tags_id)) {
                    $tags_id[] = $new_id;
                }
            }


            // 2 to 5 actors
            $number_actors = random_int(2, 5);
            $actors_id = [];

            for ($i=0; $i < $number_actors; $i++) {
                $new_id = random_int(1, 25);
                if(!in_array($new_id, $actors_id)) {
                    $actors_id[] = $new_id;
                }
            }

            $movie->tags()->attach($tags_id);
            $movie->actors()->attach($actors_id);


        });
    }
}
