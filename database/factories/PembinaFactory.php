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
    $pangkalan_count = Pangkalan::count();
    return [
      'user_id' => User::factory()->create()->id,
      'pangkalan_id' => mt_rand(1, $pangkalan_count),
      'jabatan' => 'Pembina',
      'gender' => fake()->regexify('(Laki-laki|Perempuan)'),
      'no_hp' => fake()->phoneNumber(),
      'alamat' => fake()->address(),
      'tanggal_lahir' => fake()->date('Y-m-d', '-30 years'),
      // https://api.multiavatar.com/user + [0-9] + .png
      'foto' => '/img/default-profile/user' . fake()->randomDigit() . '.png',
      'agama_id' => mt_rand(1, 5)
    ];
  }
}
