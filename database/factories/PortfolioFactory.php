<?php

namespace Database\Factories;

use App\Models\Portfolio;
use App\Models\PortfolioTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portfolio>
 */
class PortfolioFactory extends Factory
{
    protected $model = Portfolio::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        
        return [
            'slug' => Str::slug($title) . '-' . time(),
            'url_button' => $this->faker->optional()->url(),
            'is_main_page' => $this->faker->boolean(30),
            'when' => $this->faker->optional()->date(),
            'status' => $this->faker->boolean(80),
            'ordering' => $this->faker->numberBetween(0, 100),
            'photo' => '',
        ];
    }

    /**
     * Indicate that the portfolio is active.
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => true,
        ]);
    }

    /**
     * Indicate that the portfolio is on main page.
     */
    public function mainPage(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_main_page' => true,
        ]);
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Portfolio $portfolio) {
            // Создаем переводы для всех языков
            foreach (['ru', 'en', 'tm'] as $locale) {
                PortfolioTranslation::factory()->create([
                    'portfolio_id' => $portfolio->id,
                    'locale' => $locale,
                    'title' => $this->faker->sentence(3),
                    'who' => $this->faker->optional()->sentence(),
                    'description' => $this->faker->optional()->paragraph(),
                    'target' => $this->faker->optional()->sentence(),
                    'result' => $this->faker->optional()->paragraph(),
                ]);
            }
        });
    }
}
