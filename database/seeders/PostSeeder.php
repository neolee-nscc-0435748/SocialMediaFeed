<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Meme 1',
            'image_url' => 'https://d.newsweek.com/en/full/1176971/obesity-meme.png?w=1600&h=1200&q=88&f=e427296d9c04b9020a09aedbddd40dc6',
            'description' => 'What is the free food?',
            'created_by' => 1,
            'created_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'title' => 'Meme 2',
            'image_url' => 'https://i0.wp.com/canfasdblog.com/wp-content/uploads/2020/04/covid4-1.jpg?fit=691%2C361&ssl=1',
            'description' => 'Do you wanna?',
            'created_by' => 2,
            'created_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'title' => 'Meme 3',
            'image_url' => 'https://i.pinimg.com/736x/cd/90/9c/cd909c37a4ce3920198f8f3608ce2f7b.jpg',
            'description' => 'Do you wanna?',
            'created_by' => 3,
            'created_at' => Carbon::now()
        ]);

    }
}
