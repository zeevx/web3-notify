<?php

namespace Database\Factories;

use App\Models\Platform;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PlatformFactory extends Factory
{

    protected $model = Platform::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->slug('1'),
            'code' => Str::uuid(),
            'url' => $this->faker->url(),
            'rss' => $this->faker->url(),
            'color' => $this->faker->hexColor
        ];
    }
}
