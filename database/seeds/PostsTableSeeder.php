<?php
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i<10; $i++) {
            $post = new Post();
            $post->title = $faker->sentence();
            $post->content = $faker->paragraph(rand(10, 40), false);
            $post->slug = Str::slug($post->title, '-');
            $post->save();
        }
    }
}
