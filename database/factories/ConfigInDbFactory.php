<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ConfigInDbFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'key'=>$this->faker->sentence(10),
            'value'=>$this->faker->sentence(100)  
             
        ];
    }
}
