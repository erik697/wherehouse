<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\WherehouseProduct;
use App\Models\log_product;

class LogProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LogProduct::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Wherehouse_product_id' => WherehouseProduct::factory(),
            'amount' => $this->faker->numberBetween(-10000, 10000),
            'type' => $this->faker->randomElement(["in","out"]),
        ];
    }
}
