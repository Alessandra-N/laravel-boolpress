<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $article = new Article();
            $article->title = $faker->words(5, true);
            $article->content = $faker->words(30, true);
            $article->save();
        }
    }
}
