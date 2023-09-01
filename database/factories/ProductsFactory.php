<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name'=>$this->faker->word,
            'price'=>$this->faker->randomNumber(2),
            'quantity'=>$this->faker->randomNumber(2),
            'image' => $this->faker->image('public/storage/images', 400, 300, null, false), // Adding the image field
        ];
    }
}
