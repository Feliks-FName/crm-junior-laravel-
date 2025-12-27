<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Deal;
use App\Models\DealStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deal>
 */
class DealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => $this->faker->sentence(3),
            'user_id' => User::inRandomOrder()->first()->id,
            'client_id' => Client::inRandomOrder()->first()->id,
            'status_id' => DealStatus::inRandomOrder()->first()->id,
            'comments' => $this->faker->optional()->text(50),
            'utm_source' => $this->faker->word(),
            'utm_medium' => $this->faker->word(),
            'utm_campaign' => $this->faker->word(),
            'utm_term' => $this->faker->word(),

        ];
    }
}
