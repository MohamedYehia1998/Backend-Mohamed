<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use function GuzzleHttp\Psr7\str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'price' => $this->faker->randomFloat(2, 0, 999),
            'quantity' => $this->faker->randomFloat(0, 0, 100),
            'category_id' => $this->faker->numberBetween(1, Category::query()->count())
        ];
    }
}
