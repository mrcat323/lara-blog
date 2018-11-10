<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
          DB::table('posts')->insert([
            'title' => $faker->words($nb = 5, $asText = true),
            'text' => $faker->text,
            'created_at' => Carbon::now(),
            'user_id' => 1,
            'cover_img' => 'noimage.jpg'
          ]);
        }
        DB::table('users')->insert([
          'name' => $faker->name,
          'email' => 'lorem@ipsum.com',
          'password' => Hash::make('lorem ipsum'),
          'created_at' => Carbon::now()
        ]);
    }
}
