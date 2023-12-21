<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarModel>
 */
class CarModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private function carPicker () : array
    {
        $car = ''; // Will contain the brand of the car
        $model = ''; // Will contain de model of the brand

        $carNames = array(
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
        );

        $car = $carNames[rand(0, count($carNames) -1)];
        $nbPlaces = 0;
        switch($car) {
            case 'Renault':
                $models = array('Clio','Mégane','Traffic','R12','Modus');
                $model = $models[rand(0, count($models) -1)];
                if($model == 'Traffic'){
                    $nbPlaces = 9;
                } else {
                    $nbPlaces = 5;
                }
                break;
            case 'Mazda':
                $models = array('Miata');
                $model = $models[rand(0, count($models) -1)];
                $nbPlaces = 2;
                break;
            case 'Citroën':
                $models = array(['C2', 4],['C5', 7],['GT', 2]);
                $rand = rand(0, count($models) -1);
                $model = $models[$rand][0];
                $nbPlaces = $models[$rand][1];
                break;
            case 'Peugeot':
                $models = array(['RCZ', 4],['107', 4],['5008', 7]);
                $rand = rand(0, count($models) -1);
                $model = $models[$rand][0];
                $nbPlaces = $models[$rand][1];
                break;
            case 'BMW':
                $models = array('E30','Z4','I8 Roadster');
                $model = $models[rand(0, count($models) -1)];
                if($model == 'E30'){
                    $nbPlaces = 5;
                } else {
                    $nbPlaces = 2;
                }
                break;
            case 'Audi':
                $models = array('R8','A5','Q5');
                $model = $models[rand(0, count($models) -1)];
                if($model == 'R8'){
                    $nbPlaces = 2;
                } else {
                    $nbPlaces = 5;
                }
                break;
            case 'Ford':
                $models = array('GT','Fiesta','FOCUS RS');
                $model = $models[rand(0, count($models) -1)];
                if($model == 'GT'){
                    $nbPlaces = 2;
                } else {
                    $nbPlaces = 5;
                }
                break;
            case 'Ferrari':
                $models = array('F40','LaFerrari','488 Italia');
                $model = $models[rand(0, count($models) -1)];
                if($model == 'GT'){
                    $nbPlaces = 7;
                } else {
                    $nbPlaces = 2;
                }
                break;
            case 'Lamborghini':
                $models = array('Aventador LP 740-4 S','Murciélago','Countach');
                $model = $models[rand(0, count($models) -1)];
                $nbPlaces = 2;
                break;
            case 'Subaru':
                $models = array('Impreza', 'Brz');
                $model = $models[rand(0, count($models) -1)];
                if($model == 'Impreza'){
                    $nbPlaces = 5;
                } else {
                    $nbPlaces = 4;
                }
                break;
        }
        return $finalCar = array($car, $model, $nbPlaces);
    }

    public function definition(): array
    {
        return [];
        /*
        $car = $this->carPicker();
        return [
            'name' => $car[1],
            'brand' => $car[0],
            'capacity' => $car[2]
        ];
        */
    }
}
