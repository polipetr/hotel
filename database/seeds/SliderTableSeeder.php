<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slider')->insert([
            'name' => "1.jpg",
            'small_title' => "Усещане в хотела",
            'big_title' => "One Royal Gardens",
            'description' => "Един от най-добрите хотели в българия",
            'link' => 'room_type/1',
            'link_text' => 'Запази сега',
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('slider')->insert([
            'name' => "2.jpg",
            'small_title' => "Усещане в хотела",
            'big_title' => "Монтесито",
            'description' => "Един от най-добрите хотели в българия",
            'link' => 'room_type/1',
            'link_text' => 'Запази сега',
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
