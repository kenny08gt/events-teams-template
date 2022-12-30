<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPublicData>
 */
class UserPublicDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'slug' => "slug-0",
            'raised' => 0,
            'goal' => 9999999,
            'user_id' => 0,
            'team_id' => 0,
            'event_id' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
