<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);

        $users = User::factory(10)->create();
        foreach ($users as $user) {
            $role = Role::select('id')->where('name', 'user')->first();
            $user->roles()->attach($role);
        }

        $posts = Post::factory(200)->recycle($users)->create();

        $comments = Comment::factory(100)->recycle($users)->recycle($posts)->create();

        $categories = Category::factory(30)->create();

        $categorypost = CategoryPost::factory(100)->recycle($categories)->recycle($posts)->create();

        $admin = User::factory()
            ->has(Post::factory(45))
            ->has(Comment::factory(120)->recycle($posts))
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
