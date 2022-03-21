<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use function bcrypt;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.admin',
            'password' => bcrypt('adminadmin'),
            'role' => User::ROLES['admin'],
        ]);

        $this->call([
            PostSeeder::class,
        ]);
    }
}
