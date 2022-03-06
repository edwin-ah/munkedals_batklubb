<?php

namespace Database\Factories;

use App\Models\InformationSheet;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformationSheetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = App\Models\InformationSheet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'pdfName' => 'pdf-test.pdf',
            'filePath' => 'storage/uploads/pdfs/informationsheets/pdf-test.pdf',
            'created_at' => now()
        ];
    }
}
