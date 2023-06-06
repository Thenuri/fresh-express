<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
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

        'Sname'=> $this->faker->name(),
        'Saddress'=> $this->faker->address(),
        'Sphone'=> $this->faker->phoneNumber(),
        'Semail'=> $this->faker->email(),
        'Product'=> $this->faker->word(),
        ];
    }
}
