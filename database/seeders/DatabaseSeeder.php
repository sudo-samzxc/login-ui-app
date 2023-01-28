<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Client\Factory;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // to refresh database without truncating every table, execute 'php artisan migrate:fresh --seeder=DatabaseSeeder'

        // to refresh database on seeder execution
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('posts')->truncate();

        $mainUser = User::factory()->create(['username' => 'jennuelsamfernandez', 'name' => 'Jennuel Sam Fernandez', 'email' => 'jennuelsamfernandez@gmail.com', 'password' => bcrypt('sam123')]);
        Post::factory(10)->create(['user_id' => $mainUser->id]);
        Post::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call(UsersTableSeeder::class);
    }
}