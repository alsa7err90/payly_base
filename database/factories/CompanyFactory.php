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
            'state'=>$this->faker->sentence(10), 
            'fee'=>$this->faker->boolean(), 
            'type_fee'=>$this->faker->sentence(10), 
            'url_api'=>$this->faker->sentence(100), 
            'api_key'=>$this->faker->sentence(100), 
            'message'=>$this->faker->sentence(100), 
            'fee'=>$this->faker->rand(1,115)
        ];
    }
}
 