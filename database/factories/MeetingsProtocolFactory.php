<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MeetingsProtocolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\MeetingsProtocol::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'year' => $this->faker->year(),
            'date' => now(),
            'pdfName' => 'pdf-test.pdf',
            'filePath' => 'storage/uploads/pdfs/informationsheets/pdf-test.pdf' 
        ];
    }
}
