<?php

namespace Database\Factories;

use App\Models\CurrentInformation;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurrentInformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CurrentInformation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'header' => $this->faker->words($nb = 3, $asText = true),
            'description' => $this->faker->text($maxNBChars = 200),
            'created_at' => now()
        ];
    }
}
