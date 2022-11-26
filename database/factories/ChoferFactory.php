<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chofer>
 */
class ChoferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->nombre(),
            'apellidos'  => $this->faker->apellidos(),
            'dirparticular' => $this->faker->dirparticular(),
            'ci' => $this->faker->ci()
            ];
    }
}
