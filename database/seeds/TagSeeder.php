<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Pesca','Caccia','Nuoto','Calcio','Tennis','Basket','Rugby'];

        foreach ($tags as $nameTag) {
            $t = new Tag();
            $t->name = $nameTag;
            $t->slug = Str::slug($nameTag);

            $t->save();
        }
    }
}
