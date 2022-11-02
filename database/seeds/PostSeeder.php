<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;
use App\Tag;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categoriesIds = Category::all()->pluck('id');
        $tags = Tag::all()->pluck('id');


        for ($i = 0; $i < 50; $i++) {
            $post = new Post();
            $post->title = $faker->words(rand(5, 10), true);
            $post->content = $faker->paragraphs(rand(10, 20), true);
            $post->slug = Str::slug($post->title);
            // Prendiamo un id random (randomElement) e gli mettiamo anche qualche NULL con il metodo (optinonal())
            $post->category_id = $faker->optional()->randomElement($categoriesIds);

            $post->save();

            $tagsId = $tags->shuffle()->take(3)->all();
            $post->tags()->sync($tagsId);
        }
    }
}
