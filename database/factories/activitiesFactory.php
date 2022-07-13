<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\activities>
 */
class ActivitiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Really good resource for looking up the faker formatters.
        // https://github.com/fzaninotto/Faker
        return [
            // 'name' => fake()->name(),
            'name' => 'Convention Activity',
            'description' => fake()->sentence(),
            'type' => 'panel',
            'points' => fake()->numberBetween(100,500),
            'guid' => fake()->ean8(),
            'starts_at' => now(),
            'ends_at' => now(),
        ];
    }
    /**
     * Indicate that the model's type.
     *
     * @return static
     */
    public function mainstage()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'mainstage',
            ];
        });
    }
    /**
     * Indicate that the model's point value.
     *
     * @return static
     */
    public function points500()
    {
        return $this->state(function (array $attributes) {
            return [
                'points' => 500,
            ];
        });
    }
}
