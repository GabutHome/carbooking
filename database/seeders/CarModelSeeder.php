<?php

namespace Database\Seeders;

use File;
use App\Models\CarModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/car_models.json');
        $cars = json_decode($json);

        foreach ($cars as $car) {
            CarModel::create([
                'carmodel_id' => $car->id,
                'brand' => $car->brand,
                'model' => $car->model,
                'plat_no' => $car->plat_no,
                'year' => $car->year,
                'type' => $car->type,
                'image' => $car->image,
                'created_at' => $car->created_at,
                'updated_at' => $car->updated_at
            ]);
        }
    }
}
