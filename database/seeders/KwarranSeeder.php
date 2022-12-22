<?php

namespace Database\Seeders;

use App\Models\Kwarran;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KwarranSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // Kwarran::factory(5)->create();
    $kwarrans = [
      [
        'nama' => 'Kota Barat',
        'nomor' => '01'
      ],
      [
        'nama' => 'Kota Utara',
        'nomor' => '02'
      ],
      [
        'nama' => 'Kota Timur',
        'nomor' => '03'
      ],
      [
        'nama' => 'Kota Selatan',
        'nomor' => '04'
      ],
      [
        'nama' => 'Kota Tengah',
        'nomor' => '05'
      ],
      [
        'nama' => 'Dungingi',
        'nomor' => '06'
      ],
      [
        'nama' => 'Hulonthalangi',
        'nomor' => '07'
      ],
      [
        'nama' => 'Sipatana',
        'nomor' => '08'
      ],
      [
        'nama' => 'Dumbo Raya',
        'nomor' => '09'
      ],
    ];

    foreach ($kwarrans as $kwarran) Kwarran::create($kwarran);
  }
}
