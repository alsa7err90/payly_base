<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
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
            'state'=>$this->faker->boolean(), 
            'fee'=>$this->faker->boolean(), 
            'type_fee'=>"percent", 
            'url_api'=>$this->faker->sentence(10), 
            'api_key'=>$this->faker->sentence(10), 
            'message'=>$this->faker->sentence(10), 
            'fee'=>$this->faker->boolean()
        ];
    }
}
 