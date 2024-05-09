<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ProductCategory;

class ProductCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductCategory::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'desc' => $this->faker->text(),
            'parent_id' => ProductCategory::factory(),
            'created_at' => $this->faker->dateTime(),
            'modified_at' => $this->faker->dateTime(),
            'deleted_at' => $this->faker->dateTime(),
        ];
    }
}
