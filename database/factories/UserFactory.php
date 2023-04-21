<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            [
                'nom' => "Clapton",
                'prenom' => "Eric",
                'username' => "er.clapton",
                'role_id' => '1',
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(10),
            ],
            [
                'nom' => "Hendrix",
                'prenom' => "Jimi",
                'username' => "ji.hendrix",
                'role_id' => '2',
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(10),
            ],

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
//    public function unverified(): static
//    {
//        return $this->state(fn (array $attributes) => [
//            'email_verified_at' => null,
//        ]);
//    }
}
