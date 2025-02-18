<?php

namespace Database\Factories;

use App\Models\FAQCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class FAQCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FAQCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'FAQ Category'
        ];
    }
}
