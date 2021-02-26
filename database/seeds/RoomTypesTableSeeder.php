<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoomTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_types')->insert([
            'name' => "Апартамент",
            'cost_per_day' => 150,
            'discount_percentage' => 5,
            'size' => 3000,
            'max_adult' => 10,
            'max_child' => 5,
            'description' => 'Един от най добрите апартманети. С гледка към планината',
            'room_service' => true,
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('room_types')->insert([
            'name' => "Студио",
            'cost_per_day' => 100,
            'discount_percentage' => 10,
            'size' => 2000,
            'max_adult' => 8,
            'max_child' => 4,
            'description' => 'Един от най добрите апартманети. С гледка към планината',
            'room_service' => true,
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    
    }
}
