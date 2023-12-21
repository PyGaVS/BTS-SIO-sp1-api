<?php

namespace Database\Seeders;

use App\Models\CarModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $finalModels = [];
        $brands = [
            'Renault',
            'Mazda',
            'Citroën',
            'Peugeot',
            'BMW',
            'Audi',
            'Ford',
            'Ferrari',
            'Lamborghini',
            'Subaru',
        ];

        foreach($brands as $brand){
            switch($brand) {
                case 'Renault':
                    $models = array('Clio','Mégane','Traffic','R12','Modus');
                    foreach($models as $model){
                        if($model == 'Traffic'){
                            $nbPlaces = 9;
                        } else {
                            $nbPlaces = 5;
                        }
                        CarModel::factory()->create([
                            'name' => $model,
                            'brand' => $brand,
                            'capacity' => $nbPlaces,
                        ]);
                    }
                    break;
                case 'Mazda':
                    $models = array('Miata');
                    $nbPlaces = 2;
                    foreach($models as $model) {
                        CarModel::factory()->create([
                            'name' => $model,
                            'brand' => $brand,
                            'capacity' => $nbPlaces,
                        ]);
                    }
                    break;
                case 'Citroën':
                    $models = array(['C2', 4],['C5', 7],['GT', 2]);
                    foreach($models as $model) {
                        CarModel::factory()->create([
                            'name' => $model[0],
                            'brand' => $brand,
                            'capacity' => $model[1],
                        ]);
                    }
                    break;
                case 'Peugeot':
                    $models = array(['RCZ', 4],['107', 4],['5008', 7]);
                    foreach($models as $model) {
                        CarModel::factory()->create([
                            'name' => $model[0],
                            'brand' => $brand,
                            'capacity' => $model[1],
                        ]);
                    }
                    break;
                case 'BMW':
                    $models = array('E30','Z4','I8 Roadster');
                    foreach($models as $model) {
                        if($model == 'E30'){
                            $nbPlaces = 5;
                        } else {
                            $nbPlaces = 2;
                        }
                        CarModel::factory()->create([
                            'name' => $model,
                            'brand' => $brand,
                            'capacity' => $nbPlaces,
                        ]);
                    }
                    break;
                case 'Audi':
                    $models = array('R8','A5','Q5');
                    foreach($models as $model) {
                        if ($model == 'R8') {
                            $nbPlaces = 2;
                        } else {
                            $nbPlaces = 5;
                        }
                        CarModel::factory()->create([
                            'name' => $model,
                            'brand' => $brand,
                            'capacity' => $nbPlaces,
                        ]);
                    }
                    break;
                case 'Ford':
                    $models = array('GT','Fiesta','FOCUS RS');
                    foreach($models as $model) {
                        if ($model == 'GT') {
                            $nbPlaces = 2;
                        } else {
                            $nbPlaces = 5;
                        }
                        CarModel::factory()->create([
                            'name' => $model,
                            'brand' => $brand,
                            'capacity' => $nbPlaces,
                        ]);
                    }
                case 'Ferrari':
                    $models = array('F40','LaFerrari','488 Italia');
                    foreach($models as $model) {
                        if($model == 'LaFerrari'){
                            $nbPlaces = 7;
                        } else {
                            $nbPlaces = 2;
                        }
                        CarModel::factory()->create([
                            'name' => $model,
                            'brand' => $brand,
                            'capacity' => $nbPlaces,
                        ]);
                    }
                    break;
                case 'Lamborghini':
                    $models = array('Aventador LP 740-4 S','Murciélago','Countach');
                    $nbPlaces = 2;
                    foreach($models as $model) {
                        CarModel::factory()->create([
                            'name' => $model,
                            'brand' => $brand,
                            'capacity' => $nbPlaces,
                        ]);
                    }
                    break;
                case 'Subaru':
                    $models = array('Impreza', 'Brz');
                    foreach($models as $model) {
                        if ($model == 'Impreza') {
                            $nbPlaces = 5;
                        } else {
                            $nbPlaces = 4;
                        }
                        CarModel::factory()->create([
                            'name' => $model,
                            'brand' => $brand,
                            'capacity' => $nbPlaces,
                        ]);
                    }
                    break;
            }
        }
        //CarModel::factory()->count(30)->create();
    }
}
