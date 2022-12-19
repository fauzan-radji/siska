<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use App\Models\Pembina;
use App\Models\Poin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Jadwal::factory(75)->create();

    $poins = Poin::all();

    Jadwal::all()->each(function ($jadwal) use ($poins) {
      $pembinas = Pembina::where('pangkalan_id', $jadwal->pangkalan_id)->get();
      $jadwal->pembinas()->attach(
        $pembinas->random(
          mt_rand(1, $pembinas->count())
        )
      );
      $jadwal->poins()->attach(
        $poins->random(
          mt_rand(1, 5)
        )
      );
    });
  }
}
