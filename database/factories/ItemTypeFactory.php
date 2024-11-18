<?php

namespace Database\Factories;

use App\Models\ItemType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemType>
 */
class ItemTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'types' => $this->faker->word(),
            // 'types' => $this->faker->unique()->randomElement(['Home Decor', 'Traditional Handcraft', 'Cultural']), 
        ];
    }
}
