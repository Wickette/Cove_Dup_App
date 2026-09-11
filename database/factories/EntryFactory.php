<?php

namespace Database\Factories;

use App\Models\Cove;
use App\Models\Entry;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory<Entry>
 */
class EntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cove_id' => Cove::factory(),
            'type' => $this->faker->randomElement(['note', 'photo', 'link', 'voice', 'song']),
        ];
    }

    public function note(): static
    {
        return $this->state(fn(array $attributes) => [
            'type' => 'note',
            'body' => $this->faker->paragraph(),
        ]);
    }

    public function photo(): static
    {
        return $this->state(fn(array $attributes) => [
            'type' => 'photo',
            'title' => $this->faker->sentence(),
        ]);
    }

    public function voice(): static
    {
        return $this->state(fn(array $attributes) => [
            'type' => 'voice',
            'title' => $this->faker->sentence(),
        ]);
    }

    public function song(): static
    {
        return $this->state(fn(array $attributes) => [
            'type' => 'song',
            'title' => $this->faker->sentence(),
        ]);
    }

    public function link(): static
    {
        return $this->state(fn(array $attributes) => [
            'type' => 'link',
            'title' => $this->faker->sentence(),
            'url' => $this->faker->url(),
        ]);
    }
}
