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

        return Deal::factory()->count(20)->make()->each(function ($deal) use ($users, $clients, $statuses) {
                $deal->name = $this->faker->name();
                $deal->user_id = $users->random()->id;
                $deal->client_id = $clients->random()->id;
                $deal->status_id = $statuses->random()->id;
                $deal->comments = $this->faker->text();
                $deal->utm_source = $this->faker->countryCode();
                $deal->utm_medium = $this->faker->countryCode();
                $deal->utm_campaign = $this->faker->countryCode();
                $deal->utm_term = $this->faker->countryCode();
                $deal->save();
            });
    }
}
