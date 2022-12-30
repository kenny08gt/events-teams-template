<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->text(50);
        return [
            "name" => $name,
            "domain" => $this->faker->domainName,
            "slug" => Str::slug($name),
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
}
