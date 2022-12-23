<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pangkalan>
 */
class PangkalanFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'nama' => fake()->unique()->regexify('(SMK|SMA|MA)N \d\d Kota Gorontalo'),
      // 'no_gudep' => fake()->regexify('\\d{2}-\\d{3}/\\d{3}'),
      // 'ambalan' => fake()->name('male') . '-' . fake()->name('female'),
      'jenjang_pembinaan' => fake()->unique()->regexify('(Siaga|Penggalang|Penegak|Pandega)'),
      'kwarran_id' => mt_rand(1, 5), // jumlah kwarran = 5
      'alamat' => fake()->address()
    ];
  }
}
