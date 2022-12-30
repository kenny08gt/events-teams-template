<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation>
 */
class DonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'event_id' => 0,
            'user_id' => 0,
            'amount' => rand(15, 99999),
            'transaction_id' => md5($this->faker->text(100)),
            'anonymous' => rand(0, 1),
            'from_name' => $this->faker->name,
            'from_email' => $this->faker->safeEmail,
            'message' => $this->faker->text(180),
            'reply'=> $this->faker->text(180),

        ];
    }
}
