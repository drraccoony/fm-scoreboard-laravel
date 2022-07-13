<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\activities>
 */
class activitiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
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
    // $table->id();
    // $table->string('name');
    // $table->text('description')->nullable();
    // $table->enum('type', ['panel', 'mainstage', 'cache', 'special', 'other']);
    // $table->integer('points');
    // $table->string('guid');
    // $table->dateTime('starts_at');
    // $table->dateTime('ends_at');
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
