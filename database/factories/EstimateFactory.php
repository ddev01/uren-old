<?php

namespace Database\Factories;

use App\Models\Estimate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estimate>
 */
class EstimateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Estimate::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->word,
        ];
    }
}
