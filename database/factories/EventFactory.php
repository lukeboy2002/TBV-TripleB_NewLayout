<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->word,
            'slug' => fake()->unique()->slug,
            'description' => fake()->sentence,
            'body' => Collection::times(4, fn () => fake()->realText(1250))->join(PHP_EOL.PHP_EOL),
            'start_date' => fake()->dateTimeBetween('+1 Week', '+5 week'),
            'location' => fake()->city,
            'city' => fake()->streetName,
            'image' => fake()->imageUrl(),
        ];
    }
}
