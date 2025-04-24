<?php

namespace Database\Factories;

use App\Models\Message;
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
            'date' => fake()->dateTimeThisMonth(), // Data Fictícia
            'idUser' => User::pluck('id')->random(), // User Aleatório
            'text' => fake()->text(255), // Texto Fictício até 255 caracteres
            'order' => 0,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Message $message) {
            $message->order = $message->id;
            $message->save();
        });
    }
}
