<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'description'=>$this->faker->text(),
            'price'=>$this->faker->numberBetween(1000000, 10000000),
            'image'=>'http://via.placeholder.com/100x100',
            'time'=>$this->faker->time()
        ];
    }
}
