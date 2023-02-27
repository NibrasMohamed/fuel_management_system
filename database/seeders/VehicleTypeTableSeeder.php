<?php

namespace Database\Seeders;

use App\Models\VehicleType;
use Illuminate\Database\Seeder;

class VehicleTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicle_types = [
            [
                'type_name' => 'van',
                'quota' => 30
            ],
            [
                'type_name' => 'bike',
                'quota' => 4
            ],
            [
                'type_name' => 'three_wheeler',
                'quota' => 8
            ],
            [
                'type_name' => 'car',
                'quota' => 20
            ]
        ];

        foreach ($vehicle_types as $key => $vehicle_type) {
            VehicleType::create([
                'type_name' => $vehicle_type['type_name'],
                'quota' => $vehicle_type['quota']
            ]);
        }
        
    }
}
