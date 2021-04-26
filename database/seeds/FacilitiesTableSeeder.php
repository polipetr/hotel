<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->truncate();
        DB::table('facilities')->insert([
            'name' => "Климатик",
            'icon' => "air_conditioner.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Вана",
            'icon' => "bathtub.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Закуска",
            'icon' => "breakfast.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Компютър",
            'icon' => "computer.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Медицинкси принадлежности",
            'icon' => "first_aid_kit.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Сешоар",
            'icon' => "hair_dryer.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Мини бар",
            'icon' => "mini_bar.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Хладилник",
            'icon' => "mini_cooler.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Паркинг",
            'icon' => "parking.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Телефон",
            'icon' => "telephone.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Телевизия",
            'icon' => "television.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Wifi",
            'icon' => "wifi.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
