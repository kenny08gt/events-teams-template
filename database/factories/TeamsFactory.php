<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teams>
 */
class TeamsFactory extends Factory
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
            'name'=>$this->faker->company,
            'slug'=> Str::slug($this->faker->company),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
