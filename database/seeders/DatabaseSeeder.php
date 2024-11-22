<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Tags\Tag;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);

        $this->call(CategorySeeder::class);
        $categories = Category::all();
        $this->call(TagsSeeder::class);
        $tags = Tag::all();

        $users = User::factory(10)->create();
        foreach ($users as $user) {
            $role = Role::select('id')->where('name', 'user')->first();
            $user->roles()->attach($role);
        }

        $posts = Post::factory(200)
            ->has(Comment::factory(15)->recycle($users))
            ->recycle([$users, $categories])
            ->create();
        foreach ($posts as $post) {
            $random_tag = rand(0, 3);
            $tag = $tags[$random_tag];
            $post->tags()->attach($tag);
        }

        $admin = User::factory()
            ->has(Post::factory(45)->recycle($categories))
            ->has(Comment::factory(120)->recycle($posts))
//            ->has(Like::factory()->forEachSequence(
//                ...$posts->random(100)->map(fn (Post $post
//                ) => ['likeable_id' => $post]),
//            ))
            ->create([
                'username' => 'admin',
                'email' => 'admin@test.com',
                'email_verified_at' => now(),
                'password' => Hash::make('adminadmin'),
                'remember_token' => Str::random(10),
            ]);
        $role = Role::select('id')->where('name', 'admin')->first();
        $admin->roles()->attach($role);
    }
}
