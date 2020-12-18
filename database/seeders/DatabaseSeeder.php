<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//       $this->call([
//           PostSeeder::class
//       ]);
//        User::factory(1000)->create();
//        Post::factory(500)->create();
        User::factory(100)->create();
    }
}
