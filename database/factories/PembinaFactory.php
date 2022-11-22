<?php

namespace Database\Factories;

use App\Models\Pangkalan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembina>
 */
class PembinaFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'user_id' => User::factory()->create()->id,
      'pangkalan_id' => mt_rand(1, 25), // jumlah pangkalan = jumlah kwarran (5) * jumlah pangkalan per kwarran (5) = 5 * 5 = 25
      'jabatan' => 'Pembina',
      'gender' => fake()->regexify('(Laki-laki|Perempuan)'),
      'no_hp' => fake()->phoneNumber(),
      'alamat' => fake()->address(),
      'tanggal_lahir' => fake()->date('Y-m-d', '-30 years'),
      'foto' => fake()->imageUrl(200, 400, 'profile picture'),
      'agama_id' => mt_rand(1, 5)
    ];
  }
}
