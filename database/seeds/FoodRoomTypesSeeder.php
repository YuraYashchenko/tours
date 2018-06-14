<?php

use Illuminate\Database\Seeder;

class FoodRoomTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('food_types')->insert([
            ['name' => 'Dietary'],
            ['name' => 'Buffet'],
            ['name' => 'Standard']
        ]);

        DB::table('room_types')->insert([
            ['name' => 'Economy'],
            ['name' => 'Standard'],
            ['name' => 'Lux']
        ]);
    }
}
