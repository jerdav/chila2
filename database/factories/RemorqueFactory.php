<?php

namespace Database\Factories;

use App\Models\Remorque;
use Illuminate\Database\Eloquent\Factories\Factory;


class RemorqueFactory extends Factory
{
    protected $model = Remorque::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'immatriculation' => $this->faker->regexify('[A-Z]{2}-[0-9]{3}-[A-Z]{2}'),
            'n°_de_parc' => $this->faker->regexify('[0-9]{3}'),
        ];
    }
}
