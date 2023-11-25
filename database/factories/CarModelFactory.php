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
            'Citroën',
            'Peugeot',
            'BMW',
            'Audi',
            'Ford',
            'Ferrari',
            'Lamborghini',
            'Aston Martin',
        );

        $car = $carNames[rand(0, count($carNames) -1)];

        switch($car) {
            case 'Renault':
                $models = array('Clio','Mégane','Traffic');
                $model = $models[rand(0, count($models) -1)];
                break;
            case 'Citroën':
                $models = array('C2','C5','GT');
                $model = $models[rand(0, count($models) -1)];
                break;
            case 'Peugeot':
                $models = array('RCZ','107','5008');
                $model = $models[rand(0, count($models) -1)];
                break;
            case 'BMW':
                $models = array('E30','Z4','I8 Roadster');
                $model = $models[rand(0, count($models) -1)];
                break;
            case 'Audi':
                $models = array('R8','A5','Q5');
                $model = $models[rand(0, count($models) -1)];
                break;
            case 'Ford':
                $models = array('GT','Fiesta','FOCUS RS');
                $model = $models[rand(0, count($models) -1)];
                break;
            case 'Ferrari':
                $models = array('F40','La Farrari','488 Italia');
                $model = $models[rand(0, count($models) -1)];
                break;
            case 'Lamborghini':
                $models = array('Aventador LP 740-4 S','Murciélago','Countach');
                $model = $models[rand(0, count($models) -1)];
                break;
            case 'Aston Martin':
                $models = array('Vulcan','DB7','Vanquish');
                $model = $models[rand(0, count($models) -1)];
                break;
        }
        return $finalCar = array($car, $model);
    }

    public function definition(): array
    {
        $car = $this->carPicker();
        return [
            'name' => $car[0],
            'brand' => $car[1]
        ];
    }
}
