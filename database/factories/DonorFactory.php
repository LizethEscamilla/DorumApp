<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donor>
 */
class DonorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'fecha_nacimiento' => $this->faker->date(), 
            'tipo_sangre' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']), 
            'genero' => $this->faker->randomElement(['Masculino', 'Femenino']), 
            'historial_medico' => $this->faker->text(200), 
        ];
    }
}
