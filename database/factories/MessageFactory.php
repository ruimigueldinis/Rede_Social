<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->date(), // Data Fictícia
            'idUser' => User::pluck('id')->random(), // User Aleatório
            'text' => fake()->text(255) // Texto Fictício até 255 caracteres
            //
        ];
    }
}
