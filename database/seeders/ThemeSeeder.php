<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            'name' => 'Cerulean',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/cerulean/bootstrap.min.css',
            'created_by' => 3,
            'created_at' => Carbon::now()
        ]);

        DB::table('themes')->insert([
            'name' => 'Cyborg',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/cyborg/bootstrap.min.css',
            'created_by' => 3,
            'created_at' => Carbon::now()
        ]);

        DB::table('themes')->insert([
            'name' => 'Journal',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/journal/bootstrap.min.css',
            'created_by' => 3,
            'created_at' => Carbon::now()
        ]);

        DB::table('themes')->insert([
            'name' => 'Sketchy',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/sketchy/bootstrap.min.css',
            'created_by' => 3,
            'created_at' => Carbon::now()
        ]);
    }
}
