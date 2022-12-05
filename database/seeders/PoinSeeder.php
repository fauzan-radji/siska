<?php

namespace Database\Seeders;

use App\Models\Poin;
use App\Models\Agama;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PoinSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    foreach (Agama::all() as $agama) {
      Poin::create([
        'nomor' => "1a",
        'isi' => fake()->realText(mt_rand(100, 200)),
        'agama_id' => $agama->id
      ]);
      Poin::create([
        'nomor' => "1b",
        'isi' => fake()->realText(mt_rand(100, 200)),
        'agama_id' => $agama->id
      ]);
      Poin::create([
        'nomor' => "1c",
        'isi' => fake()->realText(mt_rand(100, 200)),
        'agama_id' => $agama->id
      ]);
    }

    Poin::create([
      'nomor' => '2',
      'isi' => fake()->realText(mt_rand(100, 200)),
      'agama_id' => null
    ]);

    Poin::create([
      'nomor' => '3',
      'isi' => fake()->realText(mt_rand(100, 200)),
      'agama_id' => null
    ]);

    Poin::create([
      'nomor' => '4',
      'isi' => fake()->realText(mt_rand(100, 200)),
      'agama_id' => null
    ]);

    Poin::create([
      'nomor' => '5',
      'isi' => fake()->realText(mt_rand(100, 200)),
      'agama_id' => null
    ]);
  }
}
