<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'product_id' => rand(1, 10),
            'status' => $this->faker->randomElement(['pending', 'accepted', 'refused', 'processing', 'shipping', 'shipped']),
            'quantity' => $this->faker->numberBetween(1, 10),
            'prix_total' => $this->faker->numberBetween(1000, 5000),
            'adresse' => $this->faker->address,
            'num_telephone' => $this->faker->phoneNumber,
        ];
    }
}
