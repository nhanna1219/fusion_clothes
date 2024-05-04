<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ProductSize;

class ProductSizeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductSize::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'size_description' => $this->faker->regexify('[A-Za-z0-9]{50}'),
        ];
    }
}
