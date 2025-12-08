<?php

namespace Database\Factories;

use App\Models\EconomicGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flag>
 */
class FlagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \App\Models\Flag::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'economic_group_id' => EconomicGroup::factory(),
        ];
    }
}
