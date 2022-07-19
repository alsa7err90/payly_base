<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RequestApiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    { 

        return [
             
            'data'=>$this->faker->text(100), 
            'response'=>$this->faker->text(100), 
            'amount'=>$this->faker->numerify(100), 
            'currency'=>$this->faker->sentence(10), 
            'state'=>$this->faker->boolean(),
            'user_id'=>$this->faker->sentence(3),
        ];
    }
}
