<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->name,
            'cedula'=>$this->faker->numberBetween(1000000,9999999),
            'placa'=>$this->faker->regexify('[A-Z]{3}[0-9]{3}'),
            'marca'=>$this->faker->company,
            'tipo_vehiculo'=>$this->faker->randomElement(['Carro','Moto','Camioneta']),
            
        ];
    }
}
