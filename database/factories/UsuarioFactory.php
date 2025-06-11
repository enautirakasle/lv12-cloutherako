<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Coche;
use App\Models\Moto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name()
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (\App\Models\Usuario $usuario) {
            Coche::factory()->count(2)->create(['usuario_id' => $usuario->id]);
            Moto::factory()->count(2)->create(['usuario_id' => $usuario->id]);
        });
    }
}
