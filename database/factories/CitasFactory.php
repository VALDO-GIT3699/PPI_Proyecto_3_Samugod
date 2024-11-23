<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Citas>
 */
class CitasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Relación con un usuario
            'usuario_id' => User::factory(), // Relación con un usuario adicional
            'email' => $this->faker->unique()->safeEmail(), // Email único y seguro
            'nombre' => $this->faker->firstName(), // Nombre realista
            'apellidoma' => $this->faker->lastName(), // Apellido materno
            'apellidopa' => $this->faker->lastName(), // Apellido paterno
            'telefono' => $this->faker->numerify('##########'), // Número de teléfono de 10 dígitos
            'fecha' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'), // Fecha futura válida
            'descripcion' => $this->faker->text(200), // Descripción corta
            'doctor' => $this->faker->name('Iroel Alain Solis Cardenas'), // Nombre de doctor(a)
            'estado' => $this->faker->randomElement(['pendiente', 'confirmada', 'cancelada']), // Estado válido
        ];
    }
}
