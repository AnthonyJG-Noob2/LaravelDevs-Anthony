<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(5),
            'descripcion' =>$this->faker->sentence(5),
            'imagen' => $this->faker->randomElement([1, 2, 3, 4, 5]) . '.jpg',
            'user_id' => $this->faker->randomElement([1, 4, 5, 6])
        ];
    }
}
