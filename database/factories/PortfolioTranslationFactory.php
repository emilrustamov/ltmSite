<?php

namespace Database\Factories;

use App\Models\PortfolioTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PortfolioTranslation>
 */
class PortfolioTranslationFactory extends Factory
{
    protected $model = PortfolioTranslation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'portfolio_id' => 1, // Будет переопределено при создании
            'locale' => $this->faker->randomElement(['ru', 'en', 'tm']),
            'title' => $this->faker->sentence(3),
            'who' => $this->faker->optional()->sentence(),
            'description' => $this->faker->optional()->paragraph(),
            'target' => $this->faker->optional()->sentence(),
            'result' => $this->faker->optional()->paragraph(),
        ];
    }
}
