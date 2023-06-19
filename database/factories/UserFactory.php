<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        $fechaNacimiento = Carbon::now()->subYears(30); // Fecha de nacimiento hace 30 años

        return [
            'id_membresia' => 1,
            'nro_carnet' => $this->faker->numerify('#########'),
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'fecha_nacimiento' => $fechaNacimiento,
            'telefono_principal' => 7773212,
            'telefono_emergencia' => 985437,
            'email' => $this->faker->unique()->safeEmail,
            'sexo' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'tipo_sangre' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
            'peso' => $this->faker->numberBetween(50, 100),
            'direccion' => $this->faker->address,
            'password' => Hash::make('contraseña'),
            'id_tarjeta' => $this->faker->numerify('2222222'),
            'id_rol' => 2,
            'descripcion' => $this->faker->sentence,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];














        // return [
        //     'name' => fake()->name(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        // ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
