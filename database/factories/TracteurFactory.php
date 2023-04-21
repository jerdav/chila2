<?php

namespace Database\Factories;

use App\Models\Tracteur;
use Illuminate\Database\Eloquent\Factories\Factory;


class TracteurFactory extends Factory
{
    protected $model = Tracteur::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'immatriculation' => $this->faker->regexify('[A-Z]{2}-[0-9]{3}-[A-Z]{2}'),
        ];
    }
}
