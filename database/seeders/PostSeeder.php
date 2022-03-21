<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory([
            'name' => 'test',
            'email' => 'test@test.test',
            'password' => bcrypt('testtest'),
        ])->create();

        $anotherUser = User::factory([
            'name' => 'test2',
            'email' => 'test@test.test2',
            'password' => bcrypt('testtest2'),
        ])->create();

        Post::factory(20)
            ->for($user)
            ->create();

        Post::factory(20)
            ->for($anotherUser)
            ->create();

        Post::factory(10)
            ->hasTags(3)
            ->for($user)
            ->create();

        $taggedPosts = Post::factory()
            ->for($user)
            ->count(10)->create()->each(function($post, $key) {
                $post->syncTags(['test tag', 'another test tag']);
            });


            
    }
}
