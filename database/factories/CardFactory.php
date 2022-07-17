<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'amount'=>$this->faker->sentence(100), 
            'type_amount'=>$this->faker->boolean(),
            'price'=>$this->faker->random(10),
            'image'=>$this->faker->sentence(10),
            'state'=>$this->faker->sentence(10),
            'fee'=>$this->faker->sentence(10),
            'type_fee'=>$this->faker->sentence(10), 
            'company_id' => \App\Models\Company::factory()->create()->id,
        ];
    }
}
 