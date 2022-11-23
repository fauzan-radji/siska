<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kwarran>
 */
class KwarranFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'nama' => fake()->unique()->city(),
      'nomor' => fake()->regexify('\\d{2}'),
      'kamabiran' => fake()->name(),
      'ketua' => fake()->name()
    ];
  }
}
