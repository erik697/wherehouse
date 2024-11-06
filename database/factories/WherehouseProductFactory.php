<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Wherehouse;
use App\Models\WherehouseProduct;

class WherehouseProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WherehouseProduct::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Wherehouse_id' => Wherehouse::factory(),
            'user_id' => User::factory(),
            'status' => $this->faker->randomElement(["success","pending","error"]),
            'register' => $this->faker->date(),
        ];
    }
}
